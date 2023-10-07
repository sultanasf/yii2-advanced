<?php foreach ($customers as $customer) { ?>
    <h3 class="text-center">
        <?= $customer->nama ?>
    </h3>
    <table class="table border">
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Item Price</th>
        </tr>
        <?php foreach ($orders as $order) { ?>
            <?php if ($order->customer_id == $customer->id) { ?>
                <?php foreach ($order_items as $order_item) { ?>
                    <?php if ($order_item->order_id == $order->id) { ?>
                        <?php foreach ($items as $item) { ?>
                            <?php if ($item->id == $order_item->item_id) { ?>
                                <tr>
                                    <td><?= $order->id ?></td>
                                    <td><?= $order->date ?></td>
                                    <td><?= $item->id ?></td>
                                    <td><?= $item->name ?></td>
                                    <td><?= $item->price ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </table>
    <hr>
<?php } ?>