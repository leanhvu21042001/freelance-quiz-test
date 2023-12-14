<?php

class ChapterController extends BaseController
{

    private $chapterModel;
    private $lessonModel;

    public function __construct()
    {
        $this->loadModel('ChapterModel');
        $this->loadModel('LessonModel');
        $this->chapterModel = new ChapterModel;
        $this->lessonModel = new LessonModel;
    }

    public function index()
    {
        $chapters = $this->chapterModel->getChapters();
        $lessons = $this->lessonModel->getLessons();

        return $this->view("frontend.chapters.index", [
            'chapters' => $chapters,
            'lessons' => $lessons,
        ]);
    }

    public function show()
    {
        echo __METHOD__;
    }
}
