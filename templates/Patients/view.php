<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $patient
 */
?>
<div class="row">
    <aside class="column">
        <?=
            $this->element('actions', array(
                'type'       => 'Patient',
                'typePlural' => 'Patients'
            ));
        ?>
    </aside>
    <div class="column-responsive column-80">
        <div class="patients view content">
            <h3><?= h($patient->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Carrier') ?></th>
                    <td><?= $patient->has('carrier') ? $this->Html->link($patient->carrier->name, ['controller' => 'Carriers', 'action' => 'view', $patient->carrier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($patient->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Street Address') ?></th>
                    <td><?= h($patient->street_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($patient->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($patient->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zipcode') ?></th>
                    <td><?= h($patient->zipcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($patient->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($patient->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($patient->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($patient->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($patient->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Appointments') ?></h4>
                <?php if (!empty($patient->appointments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Doctor Id') ?></th>
                            <th><?= __('Appointment Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($patient->appointments as $appointments) : ?>
                        <tr>
                            <td><?= h($appointments->id) ?></td>
                            <td>
                                <?= $this->Format->getName($appointments->doctor_id, 'doctors') ?>
                            </td>
                            <td><?= h($appointments->appointment_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Appointments', 'action' => 'view', $appointments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Appointments', 'action' => 'edit', $appointments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Appointments', 'action' => 'delete', $appointments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appointments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Invoices') ?></h4>
                <?php if (!empty($patient->invoices)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Services') ?></th>
                            <th><?= __('Due') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($patient->invoices as $invoices) : ?>
                        <tr>
                            <td><?= h($invoices->id) ?></td>
                            <td><?= h($invoices->amount) ?></td>
                            <td><?= h($invoices->services) ?></td>
                            <td><?= h($invoices->due) ?></td>
                            <td><?= h($invoices->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoices->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoices->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoices->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
