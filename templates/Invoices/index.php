<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Invoice> $invoices
 */
?>
<div class="invoices index content">
    <h3><?= __('Invoices') ?></h3>

    <?=
        $this->element('actions', array(
            'type'       => 'Invoice',
            'typePlural' => 'Invoices'
        ));
    ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('patient_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('services') ?></th>
                    <th><?= $this->Paginator->sort('due') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoices as $invoice): ?>
                <tr>
                    <td><?= $this->Number->format($invoice->id) ?></td>
                    <td><?= $invoice->has('patient') ? $this->Html->link($invoice->patient->name, ['controller' => 'Patients', 'action' => 'view', $invoice->patient->id]) : '' ?></td>
                    <td><?= $this->Number->format($invoice->amount) ?></td>
                    <td><?= h($invoice->services) ?></td>
                    <td><?= h($invoice->due) ?></td>
                    <td><?= h($invoice->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $invoice->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoice->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
