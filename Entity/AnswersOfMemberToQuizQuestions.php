<?php
/**
 * @name        AnswersOfMemberToQuizQuestions
 * @package		BiberLtd\Core\ECourseManagementBundle
 *
 * @author		Murat Ünal
 *
 * @version     1.0.0
 * @date        20.09.2013
 *
 * @copyright   Biber Ltd. (http://www.biberltd.com)
 * @license     GPL v3.0
 *
 * @description Model / Entity class.
 *
 */
namespace BiberLtd\Core\Bundles\ECourseManagementBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use BiberLtd\Core\CoreEntity;

/** 
 * @ORM\Entity
 * @ORM\Table(
 *     name="answers_of_member_to_quiz_questions",
 *     options={"charset":"utf8","engine":"innodb","collate":"utf8_turkish_ci"},
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_answers_of_member_to_quiz_questions", columns={"member","question","answer"})}
 * )
 */
class AnswersOfMemberToQuizQuestions extends CoreEntity
{
    /** 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\ECourseManagementBundle\Entity\Answer")
     * @ORM\JoinColumn(name="answer", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $answer;

    /** 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\ECourseManagementBundle\Entity\Question")
     * @ORM\JoinColumn(name="question", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $question;

    /** 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\MemberManagementBundle\Entity\Member")
     * @ORM\JoinColumn(name="member", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $member;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\ECourseManagementBundle\Entity\Quiz")
     * @ORM\JoinColumn(name="quiz", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $quiz;

    /**
     * @name                  setAnswer ()
     *                                  Sets the answer property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $answer
     *
     * @return          object                $this
     */
    public function setAnswer($answer) {
        if(!$this->setModified('answer', $answer)->isModified()) {
            return $this;
        }
		$this->answer = $answer;
		return $this;
    }

    /**
     * @name            getAnswer ()
     *                            Returns the value of answer property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->answer
     */
    public function getAnswer() {
        return $this->answer;
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
     * @name                  setQuiz ()
     *                                Sets the quiz property.
     *                                Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $quiz
     *
     * @return          object                $this
     */
    public function setQuiz($quiz) {
        if(!$this->setModified('quiz', $quiz)->isModified()) {
            return $this;
        }
		$this->quiz = $quiz;
		return $this;
    }

    /**
     * @name            getQuiz ()
     *                          Returns the value of quiz property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->quiz
     */
    public function getQuiz() {
        return $this->quiz;
    }
    /******************************************************************
     * PUBLIC SET AND GET FUNCTIONS                                   *
     ******************************************************************/

}
/**
 * Change Log:
 * **************************************
 * v1.0.0                      Murat Ünal
 * 20.09.2013
 * **************************************
 * A getAnswer()
 * A getQuestion()
 * A getMember()
 * A getQuiz()
 *
 * A setAnswer()
 * A setQuestion()
 * A setMember()
 * A setQuiz()
 *
 */