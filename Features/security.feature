Feature: Security options

  Scenario: User john is not a SuperAdmin
    Given I am logged in as "john"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "SuperAdmin"
    Then I should get false

  Scenario: User john is not an Admin
    Given I am logged in as "john"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Admin"
    Then I should get false

  Scenario: User john is not a Supervisor
    Given I am logged in as "john"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Supervisor"
    Then I should get true

  Scenario: User john is not a Manager
    Given I am logged in as "john"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Manager"
    Then I should get false

  Scenario: User john is not an Operator
    Given I am logged in as "john"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Operator"
    Then I should get true

  Scenario: User john is not a User
    Given I am logged in as "john"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "User"
    Then I should get false

  Scenario: User ben is not a SuperAdmin
    Given I am logged in as "ben"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "SuperAdmin"
    Then I should get false

  Scenario: User ben is not an Admin
    Given I am logged in as "ben"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Admin"
    Then I should get false

  Scenario: User ben is not a Supervisor
    Given I am logged in as "ben"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Supervisor"
    Then I should get false

  Scenario: User ben is not a Manager
    Given I am logged in as "ben"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Manager"
    Then I should get true

  Scenario: User ben is not an Operator
    Given I am logged in as "ben"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Operator"
    Then I should get false

  Scenario: User ben is not a User
    Given I am logged in as "ben"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "User"
    Then I should get true

  Scenario: User ian is not a SuperAdmin
    Given I am logged in as "ian"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "SuperAdmin"
    Then I should get true

  Scenario: User ian is not an Admin
    Given I am logged in as "ian"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Admin"
    Then I should get true

  Scenario: User ian is not a Supervisor
    Given I am logged in as "ian"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Supervisor"
    Then I should get true

  Scenario: User ian is not a Manager
    Given I am logged in as "ian"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Manager"
    Then I should get true

  Scenario: User ian is not an Operator
    Given I am logged in as "ian"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "Operator"
    Then I should get true

  Scenario: User ian is not a User
    Given I am logged in as "ian"
    And I am on the page "https://local.test/"
    When I want to verify if I am granted "User"
    Then I should get true
