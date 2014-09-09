<?php
/**
 * @name        CoursesOfMember
 * @package		BiberLtd\Bundle\CoreBundle\ECourseManagementBundle
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
namespace BiberLtd\Bundle\ECourseManagementBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use BiberLtd\Bundle\CoreBundle\CoreEntity;

/** 
 * @ORM\Entity
 * @ORM\Table(
 *     name="courses_of_member",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     indexes={
 *         @ORM\Index(name="idx_n_courses_of_member_date_joined", columns={"date_joined"}),
 *         @ORM\Index(name="idx_n_courses_of_member_date_completed", columns={"date_completed"})
 *     },
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_courses_of_member", columns={"member","course"})}
 * )
 */
class CoursesOfMember extends CoreEntity
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
     * @ORM\Column(type="string", length=1, nullable=false)
     */
    private $status;

    /** 
     * @ORM\Column(type="decimal", length=5, nullable=false)
     */
    private $total_score;

    /** 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\MemberManagementBundle\Entity\Member")
     * @ORM\JoinColumn(name="member", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $member;

    /** 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\ECourseManagementBundle\Entity\Course")
     * @ORM\JoinColumn(name="course", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $course;

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

    /**
     * @name                  setTotalScore ()
     *                                      Sets the total_score property.
     *                                      Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $total_score
     *
     * @return          object                $this
     */
    public function setTotalScore($total_score) {
        if(!$this->setModified('total_score', $total_score)->isModified()) {
            return $this;
        }
		$this->total_score = $total_score;
		return $this;
    }

    /**
     * @name            getTotalScore ()
     *                                Returns the value of total_score property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->total_score
     */
    public function getTotalScore() {
        return $this->total_score;
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
 * A getCourse()
 * A getDateCompleted()
 * A getDateJoined()
 * A getMember()
 * A getTotalScore()
 *
 * A setCourse()
 * A setDateCompleted()
 * A setDateJoined()
 * A setMember()
 * A setTotalScore()
 *
 */