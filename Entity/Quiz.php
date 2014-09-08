<?php
/**
 * @name        Quiz
 * @package		BiberLtd\Core\BlogBundle
 *
 * @author		Murat Ünal
 *
 * @version     1.0.1
 * @date        10.10.2013
 *
 * @copyright   Biber Ltd. (http://www.biberltd.com)
 * @license     GPL v3.0
 *
 * @description Model / Entity class.
 *
 */
namespace BiberLtd\Bundle\ECourseManagementBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use BiberLtd\Core\CoreEntity;

/** 
 * @ORM\Entity
 * @ORM\Table(
 *     name="quiz",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     indexes={@ORM\Index(name="idx_n_quiz_date_created", columns={"date_created"})},
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_quiz_id", columns={"id"})}
 * )
 */
class Quiz extends CoreEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer", length=10)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date_created;

    /** 
     * @ORM\Column(type="integer", length=5, nullable=false)
     */
    private $count_questions;

    /** 
     * @ORM\Column(type="integer", length=5, nullable=false)
     */
    private $time_spent;

    /** 
     * @ORM\Column(type="decimal", length=5, nullable=false)
     */
    private $score;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\ECourseManagementBundle\Entity\Course", inversedBy="quizes")
     * @ORM\JoinColumn(name="course", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $course;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\ECourseManagementBundle\Entity\Lesson", inversedBy="quizes")
     * @ORM\JoinColumn(name="lesson", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $lesson;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\MemberManagementBundle\Entity\Member")
     * @ORM\JoinColumn(name="member", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $member;
    /******************************************************************
     * PUBLIC SET AND GET FUNCTIONS                                   *
     ******************************************************************/

    /**
     * @name            getId()
     *  				Gets $id property.
     * .
     * @author          Murat Ünal
     * @since			1.0.0
     * @version         1.0.0
     *
     * @return          string          $this->id
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @name                  setCountQuestions ()
     *                                          Sets the count_questions property.
     *                                          Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_questions
     *
     * @return          object                $this
     */
    public function setCountQuestions($count_questions) {
        if(!$this->setModified('count_questions', $count_questions)->isModified()) {
            return $this;
        }
		$this->count_questions = $count_questions;
		return $this;
    }

    /**
     * @name            getCountQuestions ()
     *                                    Returns the value of count_questions property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_questions
     */
    public function getCountQuestions() {
        return $this->count_questions;
    }

    /**
     * @name                  setCourse ()
     *                                  Sets the course property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $course
     *
     * @return          object                $this
     */
    public function setCourse($course) {
        if(!$this->setModified('course', $course)->isModified()) {
            return $this;
        }
		$this->course = $course;
		return $this;
    }

    /**
     * @name            getCourse ()
     *                            Returns the value of course property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->course
     */
    public function getCourse() {
        return $this->course;
    }

    /**
     * @name                  setDateCreated ()
     *                                       Sets the date_created property.
     *                                       Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $date_created
     *
     * @return          object                $this
     */
    public function setDateCreated($date_created) {
        if(!$this->setModified('date_created', $date_created)->isModified()) {
            return $this;
        }
		$this->date_created = $date_created;
		return $this;
    }

    /**
     * @name            getDateCreated ()
     *                                 Returns the value of date_created property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->date_created
     */
    public function getDateCreated() {
        return $this->date_created;
    }

    /**
     * @name                  setLesson ()
     *                                  Sets the lesson property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $lesson
     *
     * @return          object                $this
     */
    public function setLesson($lesson) {
        if(!$this->setModified('lesson', $lesson)->isModified()) {
            return $this;
        }
		$this->lesson = $lesson;
		return $this;
    }

    /**
     * @name            getLesson ()
     *                            Returns the value of lesson property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->lesson
     */
    public function getLesson() {
        return $this->lesson;
    }

    /**
     * @name                  setMember ()
     *                                  Sets the member property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $member
     *
     * @return          object                $this
     */
    public function setMember($member) {
        if(!$this->setModified('member', $member)->isModified()) {
            return $this;
        }
		$this->member = $member;
		return $this;
    }

    /**
     * @name            getMember ()
     *                            Returns the value of member property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->member
     */
    public function getMember() {
        return $this->member;
    }

    /**
     * @name                  setScore ()
     *                                 Sets the score property.
     *                                 Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $score
     *
     * @return          object                $this
     */
    public function setScore($score) {
        if(!$this->setModified('score', $score)->isModified()) {
            return $this;
        }
		$this->score = $score;
		return $this;
    }

    /**
     * @name            getScore ()
     *                           Returns the value of score property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->score
     */
    public function getScore() {
        return $this->score;
    }

    /**
     * @name                  setTimeSpent ()
     *                                     Sets the time_spent property.
     *                                     Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $time_spent
     *
     * @return          object                $this
     */
    public function setTimeSpent($time_spent) {
        if(!$this->setModified('time_spent', $time_spent)->isModified()) {
            return $this;
        }
		$this->time_spent = $time_spent;
		return $this;
    }

    /**
     * @name            getTimeSpent ()
     *                               Returns the value of time_spent property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->time_spent
     */
    public function getTimeSpent() {
        return $this->time_spent;
    }

}
/**
 * Change Log:
 * **************************************
 * v1.0.1                     Murat Ünal
 * 10.10.2013
 * **************************************
 * A getCountQuestions()
 * A getCourse()
 * A getDateCreated()
 * A getId()
 * A getLesson()
 * A getMember()
 * A getScore()
 * A getTimeSpent()
 *
 * A setCountQuestions()
 * A setCourse()
 * A setDateCreated()
 * A setLesson()
 * A setMember()
 * A setScore()
 * A setTimeSpent()
 *
 */