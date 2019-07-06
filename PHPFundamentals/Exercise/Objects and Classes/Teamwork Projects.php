<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/15/2018
 * Time: 23:47 PM
 */


class Team
{

    private $teamName;
    private $teamLeader;
    private $member;
    private $teamList = [];

    /**
     * @return array
     */
    public function getTeamList(): array
    {
        return $this->teamList;
    }

    /**
     * @param mixed $teamName
     */
    public function setTeamName($teamName): void
    {
        $this->teamName = $teamName;
    }

    /**
     * @param mixed $member
     */
    public function setMember($member): void
    {
        $this->member = $member;
    }


    /**
     * @param mixed $teamLeader
     */
    public function setTeamLeader($teamLeader): void
    {
        $this->teamLeader = $teamLeader;
    }

    public function checkLeaderAvailability($member): bool
    {
        $available = true;
        foreach ($this->teamList as $members) {
            if ($member == $members['leader']) {
                $available = false;
            }
        }
        return $available;
    }

    public function checkMemberAvailability($member): bool
    {
        $available = true;
        foreach ($this->teamList as $members) {
            foreach($members['members'] as $teamMember){
                if ($member == $teamMember) {
                    $available = false;
                }
            }
        }
        return $available;
    }

    public function register()
    {
        if (!array_key_exists($this->teamName, $this->teamList)) {
            if($this->checkLeaderAvailability($this->teamLeader) === true) {
                $this->teamList[$this->teamName]['leader'] = $this->teamLeader;
                $this->teamList[$this->teamName]['members'] = array();
                printf("Team %s has been created by %s!" . PHP_EOL, $this->teamName, $this->teamLeader);
            } else {
                printf("%s cannot create another team!" . PHP_EOL, $this->teamLeader);
            }
        } else {
            printf("Team %s was already created!" . PHP_EOL, $this->teamName);
        }
    }

    public function addMember()
    {
        if(!array_key_exists($this->teamName, $this->teamList)) {
            printf("Team %s does not exist!" . PHP_EOL,$this->teamName);
        }
        elseif ($this->checkMemberAvailability($this->member) === true && $this->checkLeaderAvailability($this->member)=== true) {
            $this->teamList[$this->teamName]['members'][] = $this->member;
        } else {
            printf("Member %s cannot join team %s!" . PHP_EOL, $this->member, $this->teamName);
        }
    }

    public function printTeams()
    {
        uksort($this->teamList, function ($a, $b) {
            $count_a = count($this->teamList[$a]['members']);
            $count_b = count($this->teamList[$b]['members']);
            if ($count_a == $count_b) {
                if ($a == $b) {
                    return 0;
                } else {
                    return $b > $a ? -1 : 1;
                }
            }else{
                return $count_a > $count_b ? -1 : 1;
            }
        });
        foreach ($this->teamList as $team => $members) {
            asort($members['members']);
            if (count($members['members']) > 0) {
                print $team . PHP_EOL;
                print '- '.$members['leader'] . PHP_EOL;
                foreach ($members['members'] as $id => $member) {
                    print '-- ' . $member . PHP_EOL;
                }
            }
        }
        print "Teams to disband:" . PHP_EOL;
        foreach ($this->teamList as $team => $members) {
            if (count($members['members']) == 0) {
                print $team . PHP_EOL;
            }
        }
    }
}

$team = new Team();

$n = intval(readline());
for ($i = 0; $i < $n; $i++) {
    list($teamLeader, $teamName) = explode('-', readline());
    $team->setTeamLeader($teamLeader);
    $team->setTeamName($teamName);
    $team->register();
}

$input = readline();
while ($input != 'end of assignment') {
    list($username, $teamName) = explode('->', $input);
    $team->setMember($username);
    $team->setTeamName($teamName);
    $team->addMember();
    $input = readline();
}

$team->printTeams();