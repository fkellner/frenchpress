<?php
namespace App\View;

use League\CommonMark\ConfigurableEnvironmentInterface;
use Spatie\LaravelMarkdown\MarkdownRenderer;

class SafeMarkdownRenderer extends MarkdownRenderer
{
    public function configureCommonMarkEnvironment(ConfigurableEnvironmentInterface $environment) : void
    {
        parent::configureCommonMarkEnvironment($environment);

        $environment->mergeConfig([
          'html_input' => frenchpress_setting('allowHTML'),
          'allow_unsafe_links' => (frenchpress_setting('allowUnsafeLinks') === 'true')
        ]);
    }
}
