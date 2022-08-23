<?php

class Comment
{
    /**
     * @var int $id
     */
    private int $id;

    /**
     *@var string|null $username 
     */
    private ?string $username;

    /**
     * @var string|null $content
     */
    private ?string $content;

    /**
     * @var int|null $user_id reference User(id)
     */
    private ?int $user_id;

    /**
     * @var string|null $article_id reference article(id)
     */
    private ?string $article_id;

    /**
     * Get the value of id
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the value of username
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * Get the value of content
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
    
    /**
     * Get the value of user_id
     */
    public function getUser_id(): ?int
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * Get $article_id
     *
     * @return  int 
     */
    public function getArticle_Id(): int
    {
        return $this->article_id;
    }

    /**
     * Set $article_id
     *
     * @param  int  $article_id
     *
     * @return  void
     */
    public function setArticle_Id(int $article_id): void
    {
        $this->article_id = $article_id;
    }
}
