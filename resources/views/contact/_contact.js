<div>
    <div className="form w100">
        <fieldset>
            <div className="field long">
                <label for="Name">Contact Name</label>
                <input autocomplete="off" type="text" id="Name" name="Name" maxlength="255" value="test3" placeholder="Company name" data-automation-id="company-name">
            </div>
            <div className="field long">
                <div id="AccountNumberLink">
                    <a id="addAccountNumber" href="javascript:">Add account number</a>
                </div>
                <div id="AccountNumberInput">
                    <label for="AccountNumber">Account Number</label>
                    <input autocomplete="off" type="text" id="AccountNumber" name="AccountNumber" maxlength="50" value="" placeholder="" style="width:100px" data-validation="accountNumber" data-validation-tooltip="AccountNumberTooltip">
                </div>
                <div id="AccountNumberTooltip" className="alert tooltip">
                    <em className="message-icon" style=""></em>
                    <span className="message-text">This account number is already in use.</span>
                </div>
    </div>
    </fieldset><script type="text/javascript">
    Ext.onReady(function(){
    if ( Ext.fly('Name')) {
    Ext.fly('Name').focus();
    }
    });
    </script><fieldset>
    <div className="field short"><label for="FirstName">
    Primary Person
    </label><input autocomplete="off" type="text" id="FirstName" name="FirstName" maxlength="255" value="" placeholder="First"><input autocomplete="off" type="text" id="LastName" name="LastName" maxlength="255" value="" placeholder="Last"></div>
    <div className="field long"><label for="Email">
    Email
    </label><input autocomplete="off" type="text" id="EmailAddress" name="EmailAddress" maxlength="500" value="" placeholder="name@email.com"></div>
    <div id="people" style="display:none;">
    <div id="secondaryContacts"></div>
    </div><a id="addPerson" href="#" onclick="Contact.getSecondaryContactHtml();return false;" style="margin-bottom:20px;clear:both;">
    Add another person
    </a></fieldset>
    <fieldset id="numbers">
    <div className="field number"><label for="number">Phone</label><input autocomplete="off" type="text" id="DefaultCountryCode" name="DefaultCountryCode" maxlength="20" value="" placeholder="Country"><input autocomplete="off" type="text" id="DefaultAreaCode" name="DefaultAreaCode" maxlength="10" value="" placeholder="Area"><input autocomplete="off" type="text" id="DefaultNumber" name="DefaultNumber" maxlength="50" value="" placeholder="Number" className="phone"><a href="#" id="OG_Glossary_Telephone" onclick="OrangeGirlTips.show(this, 'OG_Glossary_Telephone'); return false;" className="icons ogtip-fixed">&nbsp;</a></div>
    <div className="field number"><label for="fax">
    Fax
    </label><input autocomplete="off" type="text" id="FaxCountryCode" name="FaxCountryCode" maxlength="20" value="" placeholder="Country"><input autocomplete="off" type="text" id="FaxAreaCode" name="FaxAreaCode" maxlength="10" value="" placeholder="Area"><input autocomplete="off" type="text" id="FaxNumber" name="FaxNumber" maxlength="50" value="" placeholder="Number" className="phone"></div>
    <div className="field number"><label for="mobile">
    Mobile
    </label><input autocomplete="off" type="text" id="MobileCountryCode" name="MobileCountryCode" maxlength="20" value="" placeholder="Country"><input autocomplete="off" type="text" id="MobileAreaCode" name="MobileAreaCode" maxlength="10" value="" placeholder="Area"><input autocomplete="off" type="text" id="MobileNumber" name="MobileNumber" maxlength="50" value="" placeholder="Number" className="phone"></div>
    <div className="field number"><label for="ddi">
    Direct dial
    </label><input autocomplete="off" type="text" id="DDICountryCode" name="DDICountryCode" maxlength="20" value="" placeholder="Country"><input autocomplete="off" type="text" id="DDIAreaCode" name="DDIAreaCode" maxlength="10" value="" placeholder="Area"><input autocomplete="off" type="text" id="DDINumber" name="DDINumber" maxlength="50" value="" placeholder="Number" className="phone"></div>
    <div className="field long"><label for="SkypeUserName">
    Skype Name/Number
    </label><input autocomplete="off" type="text" id="SkypeUserName" name="SkypeUserName" maxlength="255" value="" placeholder="Skype Name/Number" style="width:200px;"><a href="#" id="OG_Glossary_Skype" onclick="OrangeGirlTips.show(this, 'OG_Glossary_Skype'); return false;" className="icons ogtip-fixed">&nbsp;</a></div>
    <div className="field long"><label for="Website">
    Website
    </label><input autocomplete="off" type="text" id="Website" name="Website" maxlength="200" value="http://" placeholder="http://www.website.com" style="width:222px;"></div>
    </fieldset>
    <fieldset>
    <div className="address"><label>Postal Address </label><div className="address-fields">
    <div className="controls"><input type="hidden" className="hidden" name="POHasGEOSet" id="POHasGEOSet" value="False"></div>
    <div className="controls"><input type="hidden" className="hidden" name="POGEO" id="POGEO" value=""></div>
    <div className="controls"><input type="hidden" className="hidden" name="POExternalSource" id="POExternalSource" value=""></div>
    <div className="controls"><input type="hidden" className="hidden" name="POExternalUniqueID" id="POExternalUniqueID" value=""></div>
    <div className="controls"><input type="hidden" className="hidden" name="POLatitude" id="POLatitude" value=""></div>
    <div className="controls"><input type="hidden" className="hidden" name="POLongitude" id="POLongitude" value=""></div>
    <div className="controls"><input type="hidden" className="hidden" name="POPlusFour" id="POPlusFour" value=""></div>
    <div className="field">
    <div id="POaddress-finder-combo" className="find-address long"><div className="x-form-field-wrap x-form-field-trigger-wrap" id="ext-gen23" style="width: 362px;"><input type="text" size="24" autocomplete="off" id="POAddressFinder" name="POAddressFinder" className="x-form-text x-form-field contactsCombo x-form-empty-field" style="width: 173px;"><img src="/common/images/default/s.gif" alt="" className="x-form-trigger x-form-arrow-trigger" id="ext-gen24"></div></div><script type="text/javascript">
    Ext.onReady(function() {

    var nameField = null;

    if (Ext.fly('Name')) {
    nameField = Ext.fly('Name').dom
    }

    new XERO.widget.AddressFinder({
    type: "PO",
    // value: "Find address",
    emptyText: "Find address",
    countryCode: "CNTRY/GB",
    country: "uk",
    contactNameField: nameField,
    searchSource: "POSTAL"
    });
    });
    </script></div>
    <div className="field long"><input autocomplete="off" type="text" id="POAttentionTo" name="POAttentionTo" maxlength="255" value="" placeholder="Attention"></div>
    <div className="field long"><textarea id="POAddress" name="POAddress" rows="" cols="" style="" maxlength="" onchange="Contact.invalidateAddressMetaData('PO');"></textarea></div>
    <div className="field long"><input autocomplete="off" type="text" id="POCity" name="POCity" onchange="Contact.invalidateAddressMetaData(&quot;PO&quot;);" maxlength="255" value="" placeholder="City/Town"></div>
    <div className="field short"><input autocomplete="off" type="text" id="PORegion" name="PORegion" onchange="Contact.invalidateAddressMetaData(&quot;PO&quot;);" maxlength="255" value="" placeholder="State/Region"><input autocomplete="off" type="text" id="POPostalCode" name="POPostalCode" onchange="Contact.invalidateAddressMetaData(&quot;PO&quot;);" maxlength="50" value="" placeholder="Postal / Zip Code
    "></div>
    <div className="field long"><input autocomplete="off" type="text" id="POCountry" name="POCountry" onchange="Contact.invalidateAddressMetaData(&quot;PO&quot;);" maxlength="50" value="" placeholder="Country"></div>
    </div>
    </div>
    </fieldset>
    <fieldset>
    <div className="address"><label>
    Street Address <br><a href="#" className="inline" onclick="Contact.copyAddress('PO', 'SA'); return false;">Same as postal address</a></label><div className="address-fields">
    <div className="controls"><input type="hidden" className="hidden" name="SAHasGEOSet" id="SAHasGEOSet" value="False"></div>
    <div className="controls"><input type="hidden" className="hidden" name="SAGEO" id="SAGEO" value=""></div>
    <div className="controls"><input type="hidden" className="hidden" name="SAExternalSource" id="SAExternalSource" value=""></div>
    <div className="controls"><input type="hidden" className="hidden" name="SAExternalUniqueID" id="SAExternalUniqueID" value=""></div>
    <div className="controls"><input type="hidden" className="hidden" name="SALatitude" id="SALatitude" value=""></div>
    <div className="controls"><input type="hidden" className="hidden" name="SALongitude" id="SALongitude" value=""></div>
    <div className="controls"><input type="hidden" className="hidden" name="SAPlusFour" id="SAPlusFour" value=""></div>
    <div className="field">
    <div id="SAaddress-finder-combo" className="find-address long"><div className="x-form-field-wrap x-form-field-trigger-wrap" id="ext-gen25" style="width: 362px;"><input type="text" size="24" autocomplete="off" id="SAAddressFinder" name="SAAddressFinder" className="x-form-text x-form-field contactsCombo x-form-empty-field" style="width: 173px;"><img src="/common/images/default/s.gif" alt="" className="x-form-trigger x-form-arrow-trigger" id="ext-gen26"></div></div><script type="text/javascript">
    Ext.onReady(function() {

    var nameField = null;

    if (Ext.fly('Name')) {
    nameField = Ext.fly('Name').dom
    }

    new XERO.widget.AddressFinder({
    type: "SA",
    // value: "Find address",
    emptyText: "Find address",
    countryCode: "CNTRY/GB",
    country: "uk",
    contactNameField: nameField,
    searchSource: "PHYSICAL"
    });
    });
    </script></div>
    <div className="field long"><input autocomplete="off" type="text" id="SAAttentionTo" name="SAAttentionTo" maxlength="255" value="" placeholder="Attention"></div>
    <div className="field long"><textarea id="SAAddress" name="SAAddress" rows="" cols="" style="" maxlength="" onchange="Contact.invalidateAddressMetaData('SA');"></textarea></div>
    <div className="field long"><input autocomplete="off" type="text" id="SACity" name="SACity" onchange="Contact.invalidateAddressMetaData(&quot;SA&quot;);" maxlength="255" value="" placeholder="City/Town"></div>
    <div className="field short"><input autocomplete="off" type="text" id="SARegion" name="SARegion" onchange="Contact.invalidateAddressMetaData(&quot;SA&quot;);" maxlength="255" value="" placeholder="State/Region"><input autocomplete="off" type="text" id="SAPostalCode" name="SAPostalCode" onchange="Contact.invalidateAddressMetaData(&quot;SA&quot;);" maxlength="50" value="" placeholder="Postal / Zip Code
    "></div>
    <div className="field long"><input autocomplete="off" type="text" id="SACountry" name="SACountry" onchange="Contact.invalidateAddressMetaData(&quot;SA&quot;);" maxlength="50" value="" placeholder="Country"></div>
    </div>
    </div>
    </fieldset>
    </div>
</div>