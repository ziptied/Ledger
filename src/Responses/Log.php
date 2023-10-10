<?php

declare(strict_types=1);

namespace Ziptied\Ledger\Responses;

use Ziptied\Ledger\Contracts\ResponseContract;

class Log implements ResponseContract
{
    public function __construct(
        public string|int $channel,
        public string $event,
        public string $user_project,
        public ?string $description,
        public ?string $icon,
        public ?string $asset_id,
        public bool $notify = false,
        public string $parse = 'text',
        public array $tags = [],
    ) {
    }

    public static function from(array $attributes): self
    {
        return new self(
            channel: $attributes['channel'],
            event: $attributes['event'],
            user_project: $attributes['user_project'],
            description: $attributes['description'] ?? null,
            icon: $attributes['icon'] ?? null,
            asset_id: $attributes['user_id'] ?? null,
            notify: $attributes['notify'] ?? false,
            parse: $attributes['parse'] ?? 'text',
            tags: $attributes['tags'] ?? [],
        );
    }

    public function toArray(): array
    {
        return [
            'channel' => $this->channel,
            'description' => $this->description,
            'event' => $this->event,
            'icon' => $this->icon,
            'notify' => $this->notify,
            'parse' => $this->parse,
            'user_project' => $this->user_project,
            'tags' => $this->tags,
            'asset_id' => $this->asset_id,
        ];
    }
}
