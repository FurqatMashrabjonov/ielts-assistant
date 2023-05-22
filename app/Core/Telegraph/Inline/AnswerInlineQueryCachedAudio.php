<?php

namespace App\Core\Telegraph\Inline;

use DefStudio\Telegraph\DTO\InlineQueryResult;

class AnswerInlineQueryCachedAudio extends InlineQueryResult
{
    protected string $type = 'audio';
    protected string $id;
    protected string $audio_file_id;
    protected string $title;
    protected string|null $caption = null;
    protected string|null $performer = null;
    protected int|null $duration = null;

    /**
     * @param string $id
     * @param string $audio_file_id
     * @param string $title
     * @return AnswerInlineQueryCachedAudio
     */
    public static function make(string $id, string $audio_file_id, string $title): AnswerInlineQueryCachedAudio
    {
        $result = new AnswerInlineQueryCachedAudio();
        $result->id = $id;
        $result->audio_file_id = $audio_file_id;
        $result->title = $title;

        return $result;
    }

    public function caption(string|null $caption): AnswerInlineQueryCachedAudio
    {
        $this->caption = $caption;

        return $this;
    }

    public function performer(string|null $performer): AnswerInlineQueryCachedAudio
    {
        $this->performer = $performer;

        return $this;
    }

    public function duration(int|null $duration): AnswerInlineQueryCachedAudio
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function data(): array
    {
        return [
            'audio_file_id' => $this->audio_file_id,
            'title' => $this->title,
            'caption' => $this->caption,
            'performer' => $this->performer,
            'audio_duration' => $this->duration,
        ];
    }
}
