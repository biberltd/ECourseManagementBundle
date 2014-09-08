<?php
/**
 * @name        Lesson
 * @package		BiberLtd\Core\ECourseManagementBundle
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
use BiberLtd\Core\CoreLocalizableEntity;
/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="lesson",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     indexes={@ORM\Index(name="idx_n_lesson_date_added", columns={"date_added"})},
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_lesson_id", columns={"id"})}
 * )
 */
class Lesson extends CoreLocalizableEntity
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
    public $date_added;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $preview_image;

    /**
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_files;

    /**
     * @ORM\Column(type="decimal", length=5, nullable=false)
     */
    private $score_to_pass;

    /**
     * @ORM\Column(type="integer", length=5, nullable=false)
     */
    private $time_to_finish;

    /**
     * @ORM\Column(type="integer", length=2, nullable=false)
     */
    private $number_of_questions;

    /**
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Bundle\ECourseManagementBundle\Entity\LessonLocalization",
     *     mappedBy="lesson"
     * )
     */
    protected $localizations;

    /**
     * @ORM\OneToMany(targetEntity="BiberLtd\Bundle\ECourseManagementBundle\Entity\Quiz", mappedBy="lesson")
     */
    private $quizes;

    /**
     * @ORM\OneToMany(targetEntity="BiberLtd\Bundle\ECourseManagementBundle\Entity\Question", mappedBy="lesson")
     */
    private $questions;

    /**
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\ECourseManagementBundle\Entity\Course", inversedBy="lessons")
     * @ORM\JoinColumn(name="course", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $course;

    /**
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\MemberManagementBundle\Entity\Member")
     * @ORM\JoinColumn(name="creator", referencedColumnName="id", nullable=false)
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
     * @name                  setCountFiles ()
     *                                      Sets the count_files property.
     *                                      Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_files
     *
     * @return          object                $this
     */
    public function setCountFiles($count_files) {
        if(!$this->setModified('count_files', $count_files)->isModified()) {
            return $this;
        }
		$this->count_files = $count_files;
		return $this;
    }

    /**
     * @name            getCountFiles ()
     *                                Returns the value of count_files property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_files
     */
    public function getCountFiles() {
        return $this->count_files;
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
     * @name                  setNumberOfQuestions ()
     *                                             Sets the number_of_questions property.
     *                                             Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $number_of_questions
     *
     * @return          object                $this
     */
    public function setNumberOfQuestions($number_of_questions) {
        if(!$this->setModified('number_of_questions', $number_of_questions)->isModified()) {
            return $this;
        }
		$this->number_of_questions = $number_of_questions;
		return $this;
    }

    /**
     * @name            getNumberOfQuestions ()
     *                                       Returns the value of number_of_questions property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->number_of_questions
     */
    public function getNumberOfQuestions() {
        return $this->number_of_questions;
    }

    /**
     * @name            setPreviewImage()
     *                  Sets the preview_image property.
     *                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $preview_image
     *
     * @return          object                $this
     */
    public function setPreviewImage($preview_image) {
        if(!$this->setModified('preview_image', $preview_image)->isModified()) {
            return $this;
        }
		$this->preview_image = $preview_image;
		return $this;
    }

    /**
     * @name            getPreview İmage()
     *                             Returns the value of preview_image property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->preview_image
     */
    public function getPreviewImage() {
        return $this->preview_image;
    }

    /**
     * @name                  setQuestions ()
     *                                     Sets the questions property.
     *                                     Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $questions
     *
     * @return          object                $this
     */
    public function setQuestions($questions) {
        if(!$this->setModified('questions', $questions)->isModified()) {
            return $this;
        }
		$this->questions = $questions;
		return $this;
    }

    /**
     * @name            getQuestions ()
     *                               Returns the value of questions property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->questions
     */
    public function getQuestions() {
        return $this->questions;
    }

    /**
     * @name                  setQuizes ()
     *                                  Sets the quizes property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $quizes
     *
     * @return          object                $this
     */
    public function setQuizes($quizes) {
        if(!$this->setModified('quizes', $quizes)->isModified()) {
            return $this;
        }
		$this->quizes = $quizes;
		return $this;
    }

    /**
     * @name            getQuizes ()
     *                            Returns the value of quizes property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->quizes
     */
    public function getQuizes() {
        return $this->quizes;
    }

    /**
     * @name                  setScoreToPass ()
     *                                       Sets the score_to_pass property.
     *                                       Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $score_to_pass
     *
     * @return          object                $this
     */
    public function setScoreToPass($score_to_pass) {
        if(!$this->setModified('score_to_pass', $score_to_pass)->isModified()) {
            return $this;
        }
		$this->score_to_pass = $score_to_pass;
		return $this;
    }

    /**
     * @name            getScoreToPass ()
     *                                 Returns the value of score_to_pass property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->score_to_pass
     */
    public function getScoreToPass() {
        return $this->score_to_pass;
    }

    /**
     * @name                  setTimeToFinish ()
     *                                        Sets the time_to_finish property.
     *                                        Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $time_to_finish
     *
     * @return          object                $this
     */
    public function setTimeToFinish($time_to_finish) {
        if(!$this->setModified('time_to_finish', $time_to_finish)->isModified()) {
            return $this;
        }
		$this->time_to_finish = $time_to_finish;
		return $this;
    }

    /**
     * @name            getTimeToFinish ()
     *                                  Returns the value of time_to_finish property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->time_to_finish
     */
    public function getTimeToFinish() {
        return $this->time_to_finish;
    }
}
/**
 * Change Log:
 * **************************************
 * v1.0.0                      Murat Ünal
 * 20.09.2013
 * **************************************
 * A getCountFiles()
 * A getCourse()
 * A getDateAdded()
 * A getId()
 * A getLesson_localizations()
 * A getLocalizations()
 * A getMember()
 * A getNumberOfQuestions()
 * A getPreviewImage()
 * A getQuestions()
 * A getQuizes()
 * A getScoreToPass()
 * A getTimeToFinish()
 *
 * A setCountFiles()
 * A setCourse()
 * A setDateAdded()
 * A setLesson_localizations()
 * A setLocalizations()
 * A setMember()
 * A setNumberOfQuestions()
 * A setPreviewImage()
 * A setQuestions()
 * A setQuizes()
 * A setScoreToPass()
 * A setTimeToFinish()
 *
 */