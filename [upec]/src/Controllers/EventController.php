<?php

namespace UPEC\Controllers;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use UPEC\Models\EventModel;

class EventController extends Controller
{

    protected $eventModel;

    public function __construct(ContainerInterface $ci)
    {

        parent::__construct($ci);
        $this->eventModel = new EventModel($ci->db);
    }


    public function index(Request $req, Response $res, $args)
    {
        // $this->eventModel->getUser(6);

        $events = $this->eventModel->getEvents();

        print_r($events);
       // $this->getOneEvent(1);

       // return $response->write('hello');
    }

    public function getOneEvent(Request $req, Response $res, $args)
    {
        $event = $this->eventModel->getOneEvent();
        print_r($event);
    }

    public function getOneCategory(Request $req, Response $res, $args )
    {
        $event = $this->eventModel->getOneCategory();
    }

    public function getCategories(Request $req, Response $res, $args)
    {
        $cat = $this->eventModel->getCategories();
    }

    public function getParticipants(Request $req, Response $res, $args)
    {
        $parts = $this->eventModel->getParticipants();
    }
}

