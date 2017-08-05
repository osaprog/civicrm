<?php

class CRM_Member_Form_MembershipViewPeriods extends CRM_Core_Form {

  /**
   * Set variables up before form is built.
   *
   * @return void
   */
  public function preProcess() {
      
    $values = array();
    $id = CRM_Utils_Request::retrieve('id', 'Positive', $this);

    // Make sure context is assigned to template for condition where we come here view civicrm/membership/view
    $context = CRM_Utils_Request::retrieve('context', 'String', $this);

    $this->assign('context', $context);

    if ($id) {

      $values = CRM_Membership_BAO_MembershipPeriod::retrieve($id);

      $contact_id = CRM_Utils_Request::retrieve('cid', 'Positive', $this);

      $displayName = CRM_Contact_BAO_Contact::displayName($contact_id);
      $this->assign('displayName', $displayName);

      if (CRM_Contact_BAO_Contact::checkDomainContact($contact_id)) {
        $displayName .= ' (' . ts('default organization') . ')';
      }

      // omitting contactImage from title for now since the summary overlay css doesn't work outside crm-container
      CRM_Utils_System::setTitle(ts('View Membership Periods for') . ' ' . $displayName);

      CRM_Member_Page_Tab::setContext($this, $contact_id);


    }
    
    #var_dump($values);
    #die();
    $this->assign('values',$values);
  }

  /**
   * Build the form object.
   *
   * @return void
   */
  public function buildQuickForm() {
    $this->addButtons(array(
      array(
        'type' => 'cancel',
        'name' => ts('Done'),
        'spacing' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
        'isDefault' => TRUE,
      ),
    ));
  }

}
