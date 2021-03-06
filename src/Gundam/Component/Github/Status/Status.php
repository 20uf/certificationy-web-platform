<?php
 /**
 * This file is part of the Certificationy web platform.
 * (c) Johann Saunier (johann_27@hotmail.fr)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 **/

namespace Gundam\Component\Github\Status;

use Gundam\Component\Github\Common\RequestableInterface;

class Status implements RequestableInterface
{
    const PENDING = 'pending';
    const SUCCESS = 'success';
    const FAILURE = 'failure';
    const ERROR = 'error';

    /**
     * @var string
     */
    protected $url;

    /**
     * @var Array
     */
    protected $options;

    /**
     * @param string $login
     * @param string $name
     * @param string $sha
     */
    public function setUrl($login, $name, $sha)
    {
        $this->url = sprintf(
            '/repos/%s/%s/statuses/%s',
            $login,
            $name,
            $sha
        );
    }

    /**
     * @param string $state
     * @param string $targetUrl
     * @param string $description
     * @param string $context
     */
    public function setOptions($state, $targetUrl, $description, $context = 'default')
    {
        $this->options = [
            'json' => [
                'state' => $state,
                'target_url' => $targetUrl,
                'description' => $description,
                'context' => $context
            ]
        ];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return Array
     */
    public function getOptions()
    {
        return $this->options;
    }
}
