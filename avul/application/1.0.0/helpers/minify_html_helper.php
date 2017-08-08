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
 * Html minifier
 *
 * @param   string  data to minify
 *
 * @return  string
 */
function minify_html($data)
{
    // remove empty chars
    $data = preg_replace(array(
        // remove new lines
        '#\n+#',

        // remove comments
        '#/\*\* .+? \*/#',
        '#<!-- .+? -->#',

        // remove spaces
        '#\s+#'
    ), ' ', $data);

    // remove space between tags
    $data = trim(preg_replace('#> <#', '><', $data));

    return $data;
}
