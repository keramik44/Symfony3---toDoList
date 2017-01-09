<?php
/**
 * Created by PhpStorm.
 * User: Marek
 * Date: 2016-12-22
 * Time: 22:53
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="task")
 */
class Task
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $quest;

    /**
     * @ORM\Column(type="string")
     */
    private $deadLine;

    /**
     * @return mixed
     */
    public function getQuest()
    {
        return $this->quest;
    }

    /**
     * @param mixed $quest
     */
    public function setQuest($quest)
    {
        $this->quest = $quest;
    }

    /**
     * @return mixed
     */
    public function getDeadLine()
    {
        return $this->deadLine;
    }

    /**
     * @param mixed $deadLine
     */
    public function setDeadLine($deadLine)
    {
        $this->deadLine = $deadLine;
    }






}