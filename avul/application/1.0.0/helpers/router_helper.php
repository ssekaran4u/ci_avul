<?php
/**
 * Urial
 *
 * An open source web application
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2015 - 2017, Krishnan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    Urial
 * @author     Krishnan <krishnan57474@gmail.com>
 * @copyright  Copyright (c) 2015 - 2017, Krishnan
 * @license    http://opensource.org/licenses/MIT   MIT License
 * @link       https://github.com/krishnan57474
 * @since      Version 1.0.0
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * URI routing helper
 *
 * @param   array   segment
 *
 * @return  void
 */
function uri_router(&$uri)
{
    // point uri to appropriate controller
    $uri[0] = 'directory';

    // look for sub controllers
    if (!isset($uri[1]) || preg_match('#^[a-zA-Z0-9]$#', $uri[1]))
    {
        array_splice($uri, 1, 0, 'home');
        return;
    }

    // initially point uri to /d/search/{keyword}
    array_splice($uri, 1, 0, 'search');

    // look for /d/{keyword}/{category | item}
    if (!isset($uri[3]))
    {
        return;
    }

    if (preg_match('#^I[\w\-]{10}$#', $uri[3]))
    {
        // point uri to /d/item/{keyword}
        $uri[1] = 'item';
    }
    else if (preg_match('#^C[\w\-]{10}$#', $uri[3]))
    {
        // point uri to /d/category/{keyword}
        $uri[1] = 'category';
    }
    else if (preg_match('#^U[\w\-]{10}$#', $uri[3]))
    {
        // point uri to sub controllers
        if (preg_match('#^review$|^report$|^claim$#', $uri[2]))
        {
            $uri[1] = $uri[2];
            unset($uri[2]);
        }
    }

    // disable access to invalid sub controllers
    if ($uri[1] === 'search'
        && preg_match('#[^\d]#', $uri[3]))
    {
        show_404(NULL, FALSE);
    }
}
