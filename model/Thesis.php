<?php

class Thesis {
    private $id;
    private $topic;
    private $startDate;
    private $endDate;

    // Constructor
    public function __construct($id, $topic, $startDate, $endDate) {
        $this->id = $id;
        $this->topic = $topic;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTopic() {
        return $this->topic;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setTopic($topic) {
        $this->topic = $topic;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }
}
