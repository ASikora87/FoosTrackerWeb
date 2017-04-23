<?php

namespace Enum;

/**
 * Player Enum
 */
abstract class Player{

    const PROFILE_PIC = "PROFILE_PIC";
    const ID = "ID";
	const NAME = "NAME";
	const HOMETOWN = "HOMETOWN";
    const BIO = "BIO";
    const DOB = "DOB";
    const HANDEDNESS = "HANDEDNESS";
    const JERSEY = "JERSEY";
	const HEIGHT_INCHES = "HEIGHT_INCHES";
	const WEIGHT_LBS = "WEIGHT_LBS";
    const ACCOUNT_CREATED = "ACCOUNT_CREATED";
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

/**
 * Game Enum
 */
abstract class Game{

    const OPPONENT = "OPPONENT";
    const DATE = "DATE";
    const OUTCOME = "OUTCOME";
}

?>