<?php

namespace UPEC\Models;
use PDO;
class EventModel extends Model
{

    public function getEvent($id)
    {
        // $this->db
        return null;
    }

    public function getEvents()
    {
        $SQL = "SELECT * FROM events order by name";
        $stmt = $this->db->query($SQL);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_OBJ);
        // checks
        try {
            if (!empty($events)) {

                return ('{"events": ' . json_encode($events) . '}');
            } else {
                return response()->status(404);
            }

        } catch (PDOException $e) {
            return response()->status(400);
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function getOneEvent($eid)
    {
        try {

            $sql = 'select * from events where eid = :eid';
            $stmt = $this->db->prepare($sql);
            //$stmt->bindValue(':id', $req->getAttribute("id"), PDO::PARAM_INT);
            $stmt->execute(["eid" => $eid]);
            //$stmt->execute();
            $event = $stmt->fetch(PDO::FETCH_OBJ);

            if (empty($event)) {
                return withJson(["error" =>
                    ["text" => "The specified person does not exist"]
                ], 404);
            } else {
                return ('{"events": ' . json_encode($event) . '}');
            }
        } catch (PDOException $e) {
            return withJson(["error" => ["text" => $e->getMessage()]], 503);
        }
    }

    public function getOneCategory($cid)
    {
        try {
            $sql = 'select * from events where cid = :cid';
            $stmt = $this->db->prepare($sql);
            $stmt->execute(["cid" => $cid]);
            $event = $stmt->fetch(PDO::FETCH_OBJ);

            if (empty($event)) {
                return withJson(["error" =>
                    ["text" => "The specified person does not exist"]
                ], 404);
            } else {
                return ('{"events": ' . json_encode($event) . '}');
            }
        } catch (PDOException $e) {
            return withJson(["error" => ["text" => $e->getMessage()]], 503);
        }
        }

        public function getCategories()
        {
            $sql = 'select * from category order by name';
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $cats = $stmt->fetchAll(PDO::FETCH_OBJ);
            // checks
            try {
                if (!empty($cats)) {

                    return ('{"events": ' . json_encode($cats) . '}');
                } else {
                    return response()->status(404);
                }

            } catch (PDOException $e) {
                return response()->status(400);
                echo '{"error":{"text":' . $e->getMessage() . '}}';
            }

        }

    public function getParticipants($eid)
    {
       $sql = 'select fname, lname from people join participate on people.pid = participate.pid where eid = :eid';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["eid" => $eid]);
        $parts = $stmt->fetchAll(PDO::FETCH_OBJ);
        // checks
        try {
            if (!empty($cats)) {

                return ('{"Participants": ' . json_encode($parts) . '}');
            } else {
                return response()->status(404);
            }

        } catch (PDOException $e) {
            return response()->status(400);
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }

    }

    public function getOneParticipants($pid, $eid)
    {
        $sql = 'select * from participate where pid = :pid and eid = :eid';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["pid" => $pid, "eid" => $eid]);
        $parts = $stmt->fetchAll(PDO::FETCH_OBJ);
        // checks
        try {
            if (!empty($parts)) {
                return ('{"Participants": ' . json_encode($parts) . '}');
            } else {
                return response()->status(404);
            }

        } catch (PDOException $e) {
            return response()->status(400);
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }

    }

}
