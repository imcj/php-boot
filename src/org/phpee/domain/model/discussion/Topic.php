<?php

namespace org\phpee\domain\model\discussion;

/**
 * @Entity
 */
class Topic
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $title;

    /**
     * @Column(type="text")
     */
    private $body;

    /**
     * @Column(type="integer", name="author_id")
     */
    private $author;

    /**
     * @Column(type="integer", name="last_reply_id")
     */
    private $lastReply;

    /**
     * @Column(type="datetime", name="created_at")
     */
    private $createdAt;

    /**
     * @Column(type="datetime", name="updated_at")
     */
    private $updatedAt;
}