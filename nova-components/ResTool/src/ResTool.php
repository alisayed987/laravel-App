<?php

namespace Vus\ResTool;

use Laravel\Nova\ResourceTool;

class ResTool extends ResourceTool
{
    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'Res Tool';
    }

    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'res-tool';
    }
}
