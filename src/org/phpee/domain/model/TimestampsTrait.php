<?php
namespace org\phpee\domain\model;

trait TimestampsTrait
{
    /**
     * @Column(type="datetime", name="created_at", nullable=true)
     */
    private $createdAt;

    /**
     * @Column(type="datetime", name="updated_at", nullable=true)
     */
    private $updatedAt;

    /**
     *
     * @PrePersist
     * @PreUpdate
     */
    public function updatedTimestamps()
    {
        $this->updatedAt = new \DateTime('now');

        if ($this->createdAt == null) {
            $this->createdAt = new \DateTime('now');
        }
    }
}