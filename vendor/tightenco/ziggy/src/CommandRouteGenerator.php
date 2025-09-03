<?php

namespace Tightenco\Ziggy;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Tightenco\Ziggy\Output\File;
use Tightenco\Ziggy\Ziggy;

class CommandRouteGenerator extends Command
{
    protected $signature = 'ziggy:generate
                            {path? : Path to the generated JavaScript file. Default: `resources/js/ziggy.js`.}
                            {--url=}
                            {--group=}';

    protected $description = 'Generate a JavaScript file containing Ziggy’s routes and configuration.';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle()
    {
        $path = $this->argument('path') ?? config('ziggy.output.path', 'resources/js/ziggy.js');
        $generatedRoutes = $this->generate($this->option('group'));

<<<<<<< HEAD
        $this->makeDirectory($path);
        $this->files->put(base_path($path), $generatedRoutes);

        $this->info('File generated!');
=======
        $path = $this->argument('path') ?? config('ziggy.output.path', 'resources/js/ziggy.js');

        if ($this->files->isDirectory(base_path($path))) {
            $path .= '/ziggy';
        } else {
            $this->makeDirectory($path);
        }

        $name = preg_replace('/(\.d)?\.ts$|\.js$/', '', $path);

        if (! $this->option('types-only')) {
            $output = config('ziggy.output.file', File::class);

            $this->files->put(base_path("{$name}.js"), new $output($ziggy));
        }

        if ($this->option('types') || $this->option('types-only')) {
            $types = config('ziggy.output.types', Types::class);

            $this->files->put(base_path("{$name}.d.ts"), new $types($ziggy));
        }

        $this->info('Files generated!');
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
    }

    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory(dirname(base_path($path)))) {
            $this->files->makeDirectory(dirname(base_path($path)), 0755, true, true);
        }

        return $path;
    }

    private function generate($group = false)
    {
        $ziggy = (new Ziggy($group, $this->option('url') ? url($this->option('url')) : null));

        $output = config('ziggy.output.file', File::class);

        return (string) new $output($ziggy);
    }
}
