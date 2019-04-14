<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LottoData
 *
 * @ORM\Table(name="lotto_data")
 * @ORM\Entity
 */
class LottoData
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="ziehungs_nummer", type="integer", nullable=false, options={"default"="-1"})
     */
    private $ziehungsNummer = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="gezogene_zahl_1", type="integer", nullable=false, options={"default"="-1"})
     */
    private $gezogeneZahl1 = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="gezogene_zahl_2", type="integer", nullable=false, options={"default"="-1"})
     */
    private $gezogeneZahl2 = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="gezogene_zahl_3", type="integer", nullable=false, options={"default"="-1"})
     */
    private $gezogeneZahl3 = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="gezogene_zahl_4", type="integer", nullable=false, options={"default"="-1"})
     */
    private $gezogeneZahl4 = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="gezogene_zahl_5", type="integer", nullable=false, options={"default"="-1"})
     */
    private $gezogeneZahl5 = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="gezogene_zahl_6", type="integer", nullable=false, options={"default"="-1"})
     */
    private $gezogeneZahl6 = '-1';

    /**
     * @var string
     *
     * @ORM\Column(name="gezogene_zahl_1bis6", type="string", length=25, nullable=false, options={"default"="-1"})
     */
    private $gezogeneZahl1bis6 = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="spiel_77", type="integer", nullable=false, options={"default"="-1"})
     */
    private $spiel77 = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="super_6", type="integer", nullable=false, options={"default"="-1"})
     */
    private $super6 = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="jahr", type="integer", nullable=false, options={"default"="-1"})
     */
    private $jahr = '-1';

    /**
     * @var string
     *
     * @ORM\Column(name="ziehungsdatum", type="string", length=11, nullable=false, options={"default"="-1"})
     */
    private $ziehungsdatum = '-1';

    /**
     * @var string
     *
     * @ORM\Column(name="kalenderwoche", type="string", length=2, nullable=false, options={"default"="-1"})
     */
    private $kalenderwoche = '-1';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datum_als_unix", type="datetime", nullable=true)
     */
    private $datumAlsUnix;

    /**
     * @var string
     *
     * @ORM\Column(name="mond_phase", type="string", length=255, nullable=false)
     */
    private $mondPhase;

    /**
     * @var string
     *
     * @ORM\Column(name="merkur_phase", type="string", length=255, nullable=false)
     */
    private $merkurPhase;

    /**
     * @var string
     *
     * @ORM\Column(name="venus_phase", type="string", length=255, nullable=false)
     */
    private $venusPhase;

    /**
     * @var string
     *
     * @ORM\Column(name="sirius_phase", type="string", length=255, nullable=false)
     */
    private $siriusPhase;


}
