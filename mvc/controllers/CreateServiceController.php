<?php

require_once 'auth/Auth.php';
require_once 'models/db/dao/ServiceDAO.php';

class CreateServiceController extends Auth
{
    private $serviceDao;

    public function __construct()
    {
        $this->needLogin();
        $this->needPremium();
        $this->serviceDao = new ServiceDAO;
    }

    public function show()
    {
        require_once 'views/services/create-service.php';
    }

    public function createService(
        $service_type,
        $service_privacy,
        $service_name,
        $service_description,
        $service_code
    )
    {
        if(empty($service_type)        ||
           empty($service_privacy)     ||
           empty($service_name)        ||
           empty($service_description) ||
           empty($service_code)
        )
        {
            $this->badRequest('All fields must be completed');
        }

        if(!preg_match('/^[A-Za-z]+[A-Za-z0-9]*$/', $service_name))
        {
            $this->badRequest('Service name can only contain letters and numbers');
        }

        if(!$this->validServicePrivacy($service_privacy))
        {
            $this->badRequest('Not valid privacy');   
        }

        if(!$this->validService($service_type))
        {
            $this->badRequest('That service doesn\'t exist');   
        }

        if($this->serviceAlreadyExists($service_name))
        {
            $this->badRequest('This service already exists');
        }

        try
        {
            $service = new Service(
                $service_type,
                $service_privacy,
                $service_name,
                $service_description,
                $service_code,
                $_SESSION['user_email']
            );

            $this->serviceDao->create($service);

            if($service_privacy == 'shared')
                header("Location: $GLOBALS[path]/user/services/create/shared?service=$service_name");
            else
                header("Location: $GLOBALS[path]/user/services");

        }catch(ExistingService $exception)
        {
            $this->badRequest('You already have this service name registered');
        }
    }

    public function deleteService($service_name)
    {
        try
        {
            $service = $this->serviceDao->findByName($_SESSION['user_email'], $service_name);    

            if(empty($service))
                throw new Exception("This service doesn't exist");
                
        }
        catch(Exception $exception)
        {
            error(404, 'Not Found', $exception->getMessage());
        }

        $this->serviceDao->delete($service);
        $this->serviceDao->deleteAllSharedUsers($service);
        header("Location: $GLOBALS[path]/user/services");
    }

    private function badRequest($description)
    {
        $redirect_message = "<strong>Try Again. </strong>You'll be redirected in 5 seconds";
        header('refresh:5; url=../create');
        error(400, 'Bad Request',"$description<br>$redirect_message");
        exit;
    }

    private function validServicePrivacy($service_privacy)
    {
        $privacy = [
            "public",
            "private",
            "shared"
        ];

        return in_array($service_privacy, $privacy);
    }

    private function validService($service_type)
    {
        $services = [
            "regex"
        ];

        return in_array($service_type, $services);
    }

    private function serviceAlreadyExists($service_name)
    {
        $service = $this->serviceDao->findByService($service_name);
        return $service != null;
    }
}