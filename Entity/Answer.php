<?php
/**
 * @name        Answer
 * @package		BiberLtd\Bundle\CoreBundle\EcourseManagementBundle
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
use BiberLtd\Bundle\CoreBundle\CoreLocalizableEntity;
/** 
 * @ORM\Entity
 * @ORM\Table(
 *     name="answer",
 *     options={"charset":"utf8","collate":"ut8_turkish_ci","engine":"innodb"},
 *     indexes={@ORM\Index(name="idx_n_answer_date_added", columns={"date_added"})},
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_answer_id", columns={"id"})}
 * )
 */
class Answer extends CoreLocalizableEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer", length=15)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="datetime", nullable=false)
     */
    public $date_added;

    /** 
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Bundle\ECourseManagementBundle\Entity\Question",
     *     mappedBy="correct_answer"
     * )
     */
    private $questions;

    /** 
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Bundle\ECourseManagementBundle\Entity\AnswerLocalization",
     *     mappedBy="answer"
     * )
     */
    protected $localizations;

    /** 
     * @ORM\ManyToOne(
     *     targetEntity="BiberLtd\Bundle\ECourseManagementBundle\Entity\Question",
     *     inversedBy="answers"
     * )
     * @ORM\JoinColumn(name="question", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $question;
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
     * @name                  setQuestion ()
     *                                    Sets the question property.
     *                                    Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $question
     *
     * @return          object                $this
     */
    public function setQuestion($question) {
        if(!$this->setModified('question', $question)->isModified()) {
            return $this;
        }
		$this->question = $question;
		return $this;
    }

    /**
     * @name            getQuestion ()
     *                              Returns the value of question property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->question
     */
    public function getQuestion() {
        return $this->question;
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
}
/**
 * Change Log:
 * **************************************
 * v1.0.1                      Murat Ünal
 * 10.10.2013
 * **************************************
 * A getDateAdded()
 * A getId()
 * A getLocalizations()
 * A getQuestion()
 * A getQuestions()
 *
 * A getDateAdded()
 * A getLocalizations()
 * A getQuestion()
 * A getQuestions()
 *
 */