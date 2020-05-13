<?php
namespace model;

class Book
{
    protected $id;
    protected $title;
    protected $authors;
    protected $subjectId;
    protected $description;
    protected $pulisher;
    protected $copyrightYear;

    public function __construct($title, $authors, $subjectId, $description, $pulisher, $copyrightYear)
    {
        $this->title = $title;
        $this->authors = $authors;
        $this->subjectId = $subjectId;
        $this->description = $description;
        $this->pulisher = $pulisher;
        $this->copyrightYear = $copyrightYear;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $authors
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;
    }

    /**
     * @return mixed
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param mixed $subjectId
     */
    public function setSubjectId($subjectId)
    {
        $this->subjectId = $subjectId;
    }

    /**
     * @return mixed
     */
    public function getSubjectId()
    {
        return $this->subjectId;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $copyrightYear
     */
    public function setCopyrightYear($copyrightYear)
    {
        $this->copyrightYear = $copyrightYear;
    }

    /**
     * @return mixed
     */
    public function getCopyrightYear()
    {
        return $this->copyrightYear;
    }

    /**
     * @param mixed $pulisher
     */
    public function setPulisher($pulisher)
    {
        $this->pulisher = $pulisher;
    }

    /**
     * @return mixed
     */
    public function getPulisher()
    {
        return $this->pulisher;
    }

}