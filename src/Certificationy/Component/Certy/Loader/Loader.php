<?php
 /**
 * This file is part of the Certificationy web platform.
 * (c) Johann Saunier (johann_27@hotmail.fr)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 **/

namespace Certificationy\Component\Certy\Loader;

use Certificationy\Component\Certy\Exception\NotAlreadyDumpedException;
use Certificationy\Component\Certy\Model\Certification;

abstract class Loader implements LoaderInterface
{
    /**
     * @param string $certificationName
     *
     * @return Certification
     */
    abstract protected function doLoad($certificationName);

    /**
     * @param string $certificationName
     */
    public function load($certificationName)
    {
        $certification = $this->doLoad($certificationName);

        if ($this->validate($certification)) {
            return $certification;
        } else {
            throw new NotAlreadyDumpedException($certificationName);
        }
    }

    /**
     * @param Certification $certification
     */
    protected function validate($certification)
    {
        return $certification instanceof Certification;
    }
}
