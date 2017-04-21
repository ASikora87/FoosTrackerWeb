<?php

namespace Enum;

/**
 * Player Enum
 */
abstract class Player{

	const NAME = "NAME";
	const HOMETOWN = "HOMETOWN";
    const BIO = "BIO";
    const HANDEDNESS = "HANDEDNESS";
    const JERSEY = "JERSEY";
	const HEIGHT = "HEIGHT_INCHES";
	const WEIGHT = "WEIGHT_LBS";
}

/**
 * Stats Enum
 */
abstract class Stats{

	const TOTAL_GOALS = "TOTAL_GOALS";
	const OFFENSIVE_GOALS = "OFFENSIVE_GOALS";
    const DEFENSIVE_GOALS = "DEFENSIVE_GOALS";
    const SLAP_BACK_GOALS = "SLAP_BACK_GOALS";
    const OWN_GOALS = "OWN_GOALS";
	const WINS = "WINS";
    const LOSSES = "LOSSES";
}

?>