<?php

/**
 * @Entity
 * @Table(name="parties")
 */
class Party {

  /**
   * @Column(name="id", type="integer")
   * @Id @GeneratedValue
   */
  private $id;

  /**
   * @Column(name="name", type="string")
   */
  private $name;

  /**
   * @Column(name="long_name", type="string")
   */
  private $longName;

  /**
   * @OneToMany(targetEntity="Candidate", mappedBy="party")
   */
  private $candidates;

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }
  public function setName($value) {
    $this->name = $value;
    return $this;
  }

  public function getLongName() {
    return $this->longName;
  }
  public function setLongName($value) {
    $this->longName = $value;
    return $this;
  }

}