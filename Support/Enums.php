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

    const GAMES_PLAYED = "GAMES_PLAYED";
	const TOTAL_GOALS = "TOTAL_GOALS";
	const OFFENSIVE_GOALS = "OFFENSIVE_GOALS";
    const DEFENSIVE_GOALS = "DEFENSIVE_GOALS";
    const SLAP_BACK_GOALS = "SLAP_BACK_GOALS";
    const OWN_GOALS = "OWN_GOALS";
	const WINS = "WINS";
    const LOSSES = "LOSSES";
    const MOST_USED_TEAM = "MOST_USED_TEAM";

    //Advanced

    const WIN_RATIO = "WIN_LOSS_RATIO";
    const WINS_AS_RED = "WINS_AS_RED";
    const WINS_AS_BLUE = "WINS_AS_BLUE";
    const LOSSES_AS_RED = "LOSSES_AS_RED";
    const LOSSES_AS_BLUE = "LOSSES_AS_BLUE";
    const SLAP_BACKS_PER_GAME = "SLAP_BACKS_PER_GAME";
    const OFFENSIVE_GOALS_PER_GAME = "OFFENSIVE_GOALS_PER_GAME";
    const DEFENSIVE_GOALS_PER_GAME = "DEFENSIVE_GOALS_PER_GAME";
    const OWN_GOALS_PER_GAME = "OWN_GOALS_PER_GAME";

    const GOALS_SCORED_MONDAY = "GOALS_SCORED_MONDAY";
    const GOALS_SCORED_TUESDAY = "GOALS_SCORED_TUESDAY";
    const GOALS_SCORED_WEDNESDAY = "GOALS_SCORED_WEDNESDAY";
    const GOALS_SCORED_THURSDAY = "GOALS_SCORED_THURSDAY";
    const GOALS_SCORED_FRIDAY = "GOALS_SCORED_FRIDAY";
}

/**
 * Game Enum
 */
abstract class Game{

    const TEAM_USED = "TEAM_USED";
    const GAME_TYPE = "GAME_TYPE";
    const OPPONENT = "OPPONENT";
    const DATE = "DATE";
    const OUTCOME = "OUTCOME";
}

/**
 * Game Enum
 */
abstract class Day{

    const MONDAY = "Monday";
    const TUESDAY = "Tuesday";
    const WEDNESDAY = "Wednesday";
    const THURSDAY = "Thursday";
    const FRIDAY = "Friday";
}

?>