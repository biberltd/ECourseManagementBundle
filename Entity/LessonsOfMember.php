<?php
/**
 * @name        LessonsOfMember
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
 *     indexes={
 *         @ORM\Index(name="idx_n_lessons_of_member_date_joined", columns={"date_joined"}),
 *         @ORM\Index(name="idx_n_lessons_of_member_date_completed", columns={"date_completed"})
 *     },
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_lessons_of_member", columns={"member","lesson"})}
 * )
 */
class LessonsOfMember extends CoreEntity
{
    /** 
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date_joined;

    /** 
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_completed;

    /** 
     * @ORM\Column(type="decimal", length=5, nullable=false)
     */
    private $score;

    /** 
     * @ORM\Column(type="string", length=1, nullable=false)
     */
    private $status;

    /** 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\ECourseManagementBundle\Entity\Lesson")
     * @ORM\JoinColumn(name="lesson", referencedColumnName="id", nullable=false)
     */
    private $lesson;

    /** 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\MemberManagementBundle\Entity\Member")
     * @ORM\JoinColumn(name="member", referencedColumnName="id", nullable=false)
     */
    private $member;

    /**
     * @name                  setDateCompleted ()
     *                                         Sets the date_completed property.
     *                                         Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $date_completed
     *
     * @return          object                $this
     */
    public function setDateCompleted($date_completed) {
        if(!$this->setModified('date_completed', $date_completed)->isModified()) {
            return $this;
        }
		$this->date_completed = $date_completed;
		return $this;
    }

    /**
     * @name            getDateCompleted ()
     *                                   Returns the value of date_completed property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->date_completed
     */
    public function getDateCompleted() {
        return $this->date_completed;
    }

    /**
     * @name                  setDateJoined ()
     *                                      Sets the date_joined property.
     *                                      Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $date_joined
     *
     * @return          object                $this
     */
    public function setDateJoined($date_joined) {
        if(!$this->setModified('date_joined', $date_joined)->isModified()) {
            return $this;
        }
		$this->date_joined = $date_joined;
		return $this;
    }

    /**
     * @name            getDateJoined ()
     *                                Returns the value of date_joined property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->date_joined
     */
    public function getDateJoined() {
        return $this->date_joined;
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
     * @name                  setStatus ()
     *                                  Sets the status property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $status
     *
     * @return          object                $this
     */
    public function setStatus($status) {
        if(!$this->setModified('status', $status)->isModified()) {
            return $this;
        }
		$this->status = $status;
		return $this;
    }

    /**
     * @name            getStatus ()
     *                            Returns the value of status property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->status
     */
    public function getStatus() {
        return $this->status;
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
 * A getDateCompleted()
 * A getDateJoined()
 * A getLesson()
 * A getMember()
 * A getScore()
 * A getStatus()
 *
 * A setDateCompleted()
 * A setDateJoined()
 * A setLesson()
 * A setMember()
 * A setScore()
 * A setStatus()
 *
 */