<?php

if (! function_exists('tenant_id')) {
    function tenant_id(): ?int
    {
        return auth()->check() ? auth()->user()->tenant_id : null;
    }
}