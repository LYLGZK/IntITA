<?php
/* @var $agreement UserAgreements
 */
?>
<div style="border: 1px solid #000;border-radius: 5px; background: #e8e8e8; padding: 5px" ng-init="checkAgreementPdf('<?php echo $agreementId ?>')">
    <form ng-if="contract.personParty.contractingParty.contractingPartyPrivatePerson.documents || pdfAgreement">
        <fieldset ng-disabled="true">
            <div ng-repeat="document in contract.personParty.contractingParty.contractingPartyPrivatePerson.documents track by $index">
                <div>
                    <em>{{document.documentType.title_ua}}</em>
                </div>
                <div ng-if="document.type==1">
                    <div class="input-group">
                        <span class="input-group-addon"><strong><?php echo Yii::t('regexp', '0162') ?>:</strong></span>
                        <input type="text" class="form-control" placeholder="<?php echo Yii::t('regexp', '0162') ?>" ng-model="document.last_name" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><strong><?php echo Yii::t('regexp', '0160') ?>:</strong></span>
                        <input type="text" class="form-control" placeholder="<?php echo Yii::t('regexp', '0160') ?>" ng-model="document.first_name" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><strong><?php echo 'По-батькові' ?>:</strong></span>
                        <input type="text" class="form-control" placeholder="<?php echo 'По-батькові' ?>" ng-model="document.middle_name" disabled>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><strong><?php echo Yii::t('regexp', '0927') ?>:</strong></span>
                    <input type="text" class="form-control" placeholder="<?php echo Yii::t('regexp', '0927') ?>" ng-model="document.number" disabled>
                </div>
                <div ng-if="document.type==1">
                    <div class="input-group">
                        <span class="input-group-addon"><strong><?php echo Yii::t('regexp', '0928') ?>:</strong></span>
                        <input type="text" class="form-control" placeholder="<?php echo Yii::t('regexp', '0928') ?>" ng-model="document.issued" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><strong><?php echo Yii::t('regexp', '0929') ?>:</strong></span>
                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" ng-model="document.issued_date" disabled>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><strong>Приписка:</strong></span>
                        <input type="text" class="form-control" placeholder="Приписка" ng-model="document.registration_address" disabled>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><strong><?php echo Yii::t('edit', '0939'); ?>:</strong></span>
                    <span>
                        <span ng-repeat="item in document.documentsFiles track by $index">
                            <a href="" ng-click="getDocument(item.id)">Переглянути документ {{$index+1}}</a>
                        </span>
                    </span>
                </div>
                <br>
                <hr style="width:80%">
            </div>
        </fieldset>
        <h2 style="text-align:center">Договір затверджений <span style="color:red" ng-if="writtenAgreement.agreement.cancel_date">(скасований)</span></h2>
        <span ng-if="writtenAgreement.agreement.actualWrittenAgreement.actual==2" class="pull-right" style="color:green">Роздруковано</span>
        <button class="btn btn-primary pull-right" style="margin: 5px 0;" ng-if="writtenAgreement.agreement.actualWrittenAgreement.actual==1" ng-click="printed(writtenAgreement.agreement.actualWrittenAgreement.id, writtenAgreement.agreement.id)">Відмітити, що договір роздруковано</button>
        <div style="text-align: center">
            <embed src="/_teacher/_accountant/agreements/getAgreementFile?id=<?php echo $agreementId ?>" width="90%" height="1200px">
        </div>
    </form>
</div>