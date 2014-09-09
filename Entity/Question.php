<?php
/**
 * @name        LessonsOfMember
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
namespace BiberLtd\Core\Bundles\ECourseManagementBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use BiberLtd\Core\CoreLocalizableEntity;

/** 
 * @ORM\Entity
 * @ORM\Table(
 *     name="question",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     indexes={@ORM\Index(name="idx_n_question_date_added", columns={"date_added"})},
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_question_id", columns={"id"})}
 * )
 */
class Question extends CoreLocalizableEntity
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
     * @ORM\Column(type="string", length=1, nullable=false)
     */
    private $type;

    /** 
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Core\Bundles\ECourseManagementBundle\Entity\QuestionLocalization",
     *     mappedBy="question"
     * )
     */
    protected $localizations;

    /** 
     * @ORM\OneToMany(targetEntity="BiberLtd\Core\Bundles\ECourseManagementBundle\Entity\Answer", mappedBy="question")
     */
    private $answers;

    /** 
     * @ORM\ManyToOne(
     *     targetEntity="BiberLtd\Core\Bundles\ECourseManagementBundle\Entity\Lesson",
     *     inversedBy="questions"
     * )
     * @ORM\JoinColumn(name="lesson", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $lesson;

    /** 
     * @ORM\ManyToOne(
     *     targetEntity="BiberLtd\Core\Bundles\ECourseManagementBundle\Entity\Answer",
     *     inversedBy="questions"
     * )
     * @ORM\JoinColumn(name="correct_answer", referencedColumnName="id", nullable=false, onDelete="RESTRICT")
     */
    private $correct_answer;
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
     * @name                  setAnswers ()
     *                                   Sets the answers property.
     *                                   Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $answers
     *
     * @return          object                $this
     */
    public function setAnswers($answers) {
        if(!$this->setModified('answers', $answers)->isModified()) {
            return $this;
        }
		$this->answers = $answers;
		return $this;
    }

    /**
     * @name            getAnswers ()
     *                             Returns the value of answers property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->answers
     */
    public function getAnswers() {
        return $this->answers;
    }

    /**
     * @name                  setCorrectAnswer ()
     *                                         Sets the correct_answer property.
     *                                         Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $correct_answer
     *
     * @return          object                $this
     */
    public function setCorrectAnswer($correct_answer) {
        if(!$this->setModified('correct_answer', $correct_answer)->isModified()) {
            return $this;
        }
		$this->correct_answer = $correct_answer;
		return $this;
    }

    /**
     * @name            getCorrectAnswer ()
     *                                   Returns the value of correct_answer property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->correct_answer
     */
    public function getCorrectAnswer() {
        return $this->correct_answer;
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
     * @name                  setType ()
     *                                Sets the type property.
     *                                Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $type
     *
     * @return          object                $this
     */
    public function setType($type) {
        if(!$this->setModified('type', $type)->isModified()) {
            return $this;
        }
		$this->type = $type;
		return $this;
    }

    /**
     * @name            getType ()
     *                          Returns the value of type property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->type
     */
    public function getType() {
        return $this->type;
    }
}
/**
 * Change Log:
 * **************************************
 * v1.0.1                      Murat Ünal
 * 10.10.2013
 * **************************************
 * A getAnswers()
 * A getCorrectAnswer()
 * A getDateAdded()
 * A getId()
 * A getLesson()
 * A getLocalizations()
 * A getType()
 *
 * A setAnswers()
 * A setCorrectAnswer()
 * A setDateAdded()
 * A setLesson()
 * A setLocalizations()
 * A setType()
 *
 */