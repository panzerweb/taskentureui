<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DueDateNotification extends Notification
{
    use Queueable;

    protected $task;
    /**
     * Create a new notification instance.
     */
    public function __construct($task)
    {
        $this->task = $task;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database']; //storing in the database
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        return (new MailMessage)
                ->greeting('Hello!')
                ->subject('Task Due Reminder')
                ->line("Your task '{$this->task->taskname}' is due on {$this->task->due_date}.")
                ->action('View Task', url('/tasks/'.$this->task->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'task_id' => $this->task->id,
            'priority_id' => $this->task->priority ? $this->task->priority->id : null,
            'category_id' => $this->task->category ? $this->task->category->id : null,
            'taskname'=> $this->task->taskname,
            'due_date' => $this->task->due_date,
        ];
    }

}
