<?php
/**
 * @name        AnswerLocalization
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
 *     name="course",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     indexes={
 *         @ORM\Index(name="idx_n_course_date_added", columns={"date_added"}),
 *         @ORM\Index(name="idx_n_course_date_published", columns={"date_published"}),
 *         @ORM\Index(name="idx_n_course_date_unpublished", columns={"date_unpublished"})
 *     },
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_course_id", columns={"id"})}
 * )
 */
class Course extends  CoreLocalizableEntity
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
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date_published;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_unpublished;

    /**
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $sort_order;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $preview_image;

    /**
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_lessons;

    /**
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Core\Bundles\ECourseManagementBundle\Entity\CourseLocalization",
     *     mappedBy="course"
     * )
     */
    protected $localizations;

    /**
     * @ORM\OneToMany(targetEntity="BiberLtd\Core\Bundles\ECourseManagementBundle\Entity\Lesson", mappedBy="course")
     */
    private $lessons;

    /**
     * @ORM\OneToMany(targetEntity="BiberLtd\Core\Bundles\ECourseManagementBundle\Entity\Quiz", mappedBy="course")
     */
    private $quizes;

    /**
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\MemberManagementBundle\Entity\Member")
     * @ORM\JoinColumn(name="creator", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $member;

    /**
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\SiteManagementBundle\Entity\Site")
     * @ORM\JoinColumn(name="site", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $site;
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
     * @name                  setCountLessons ()
     *                                        Sets the count_lessons property.
     *                                        Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_lessons
     *
     * @return          object                $this
     */
    public function setCountLessons($count_lessons) {
        if(!$this->setModified('count_lessons', $count_lessons)->isModified()) {
            return $this;
        }
		$this->count_lessons = $count_lessons;
		return $this;
    }

    /**
     * @name            getCountLessons ()
     *                                  Returns the value of count_lessons property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_lessons
     */
    public function getCountLessons() {
        return $this->count_lessons;
    }

    /**
     * @name                  setDatePublished ()
     *                                         Sets the date_published property.
     *                                         Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $date_published
     *
     * @return          object                $this
     */
    public function setDatePublished($date_published) {
        if(!$this->setModified('date_published', $date_published)->isModified()) {
            return $this;
        }
		$this->date_published = $date_published;
		return $this;
    }

    /**
     * @name            getDatePublished ()
     *                                   Returns the value of date_published property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->date_published
     */
    public function getDatePublished() {
        return $this->date_published;
    }

    /**
     * @name                  setDateUnpublished ()
     *                                           Sets the date_unpublished property.
     *                                           Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $date_unpublished
     *
     * @return          object                $this
     */
    public function setDateUnpublished($date_unpublished) {
        if(!$this->setModified('date_unpublished', $date_unpublished)->isModified()) {
            return $this;
        }
		$this->date_unpublished = $date_unpublished;
		return $this;
    }

    /**
     * @name            getDateUnpublished ()
     *                                     Returns the value of date_unpublished property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->date_unpublished
     */
    public function getDateUnpublished() {
        return $this->date_unpublished;
    }

    /**
     * @name                  setDescription ()
     *                                       Sets the description property.
     *                                       Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $description
     *
     * @return          object                $this
     */
    public function setDescription($description) {
        if(!$this->setModified('description', $description)->isModified()) {
            return $this;
        }
		$this->description = $description;
		return $this;
    }

    /**
     * @name            getDescription ()
     *                                 Returns the value of description property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @name                  setLessons ()
     *                                   Sets the lessons property.
     *                                   Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $lessons
     *
     * @return          object                $this
     */
    public function setLessons($lessons) {
        if(!$this->setModified('lessons', $lessons)->isModified()) {
            return $this;
        }
		$this->lessons = $lessons;
		return $this;
    }

    /**
     * @name            getLessons ()
     *                             Returns the value of lessons property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->lessons
     */
    public function getLessons() {
        return $this->lessons;
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
     * @name            getPreviewImage()
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
     * @name                  setSite ()
     *                                Sets the site property.
     *                                Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $site
     *
     * @return          object                $this
     */
    public function setSite($site) {
        if(!$this->setModified('site', $site)->isModified()) {
            return $this;
        }
		$this->site = $site;
		return $this;
    }

    /**
     * @name            getSite ()
     *                          Returns the value of site property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->site
     */
    public function getSite() {
        return $this->site;
    }

    /**
     * @name                  setSortOrder ()
     *                                     Sets the sort_order property.
     *                                     Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $sort_order
     *
     * @return          object                $this
     */
    public function setSortOrder($sort_order) {
        if(!$this->setModified('sort_order', $sort_order)->isModified()) {
            return $this;
        }
		$this->sort_order = $sort_order;
		return $this;
    }

    /**
     * @name            getSortOrder ()
     *                               Returns the value of sort_order property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->sort_order
     */
    public function getSortOrder() {
        return $this->sort_order;
    }

}
/**
 * Change Log:
 * **************************************
 * v1.0.1                      Murat Ünal
 * 10.10.2013
 * **************************************
 * A getAnswers()
 * A getCountLessons()
 * A getDateAdded()
 * A getDatePublished()
 * A getDateUnpublished()
 * A getDescription()
 * A getId()
 * A getLessons()
 * A getMember()
 * A getPreviewImage()
 * A getQuizes()
 * A getSite()
 * A getSortOrder()
 *
 * A setAnswers()
 * A setCountLessons()
 * A setDateAdded()
 * A setDatePublished()
 * A setDateUnpublished()
 * A setDescription()
 * A setLessons()
 * A setMember()
 * A setPreviewImage()
 * A setQuizes()
 * A setSite()
 * A setSortOrder()
 *
 */
