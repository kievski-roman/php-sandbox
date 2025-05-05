<?php

class TodoApp {
    private string $file = 'todo.json';
    private array $tasks = [];

    public function __construct() {
        if (file_exists($this->file)) {
            $this->tasks = json_decode(file_get_contents($this->file), true);
        }
    }

    private function save() {
        file_put_contents($this->file, json_encode($this->tasks, JSON_PRETTY_PRINT));
    }

    public function add(string $task) {
        $this->tasks[] = $task;
        $this->save();
        echo "✅ Задача додана: $task\n";
    }

    public function list() {
        if (empty($this->tasks)) {
            echo "📭 Немає задач.\n";
            return;
        }

        foreach ($this->tasks as $index => $task) {
            echo ($index + 1) . ". " . $task . "\n";
        }
    }

    public function remove(int $index) {
        if (!isset($this->tasks[$index - 1])) {
            echo "❌ Задача під номером $index не знайдена.\n";
            return;
        }

        $removed = $this->tasks[$index - 1];
        unset($this->tasks[$index - 1]);
        $this->tasks = array_values($this->tasks);
        $this->save();

        echo "🗑️ Задачу видалено: $removed\n";
    }
}
