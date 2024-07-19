<div class="main-content">
<div class="page-content">
    <div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
        <div
            class="page-title-box d-flex align-items-center justify-content-between"
        >
            <h4 class="mb-0 font-size-18">Article List</h4>

            <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                <a href="javascript: void(0);">Home</a>
                </li>
                <li class="breadcrumb-item active">Article</li>
            </ol>
            </div>
        </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <div class="TableHeader">
                <div class="row">
                <div class="col-lg-3">
                    <h4 class="card-title">Article</h4>
                </div>
                <div class="col-lg-9 text-right">
                    <div class="headerButtons">
                    <?php 
                        echo $this->Html->link(
                            $this->Html->tag('i', '', array('class' => 'mdi mdi-plus')) . ' Add Article',
                            array('controller' => 'Article', 'action' => 'addarticle'),
                            array('class' => 'btn btn-sm btn-success', 'escape' => false)
                        );
                    ?>
                    </div>
                </div>
                </div>
            </div>
            <div class="table-responsive">
                <table
                class="table mb-0 listingData dt-responsive"
                id="datatable"
                >
                <thead>
                    <tr>
                    <th>S. No.</th>
                    <th>Article Name</th>
                    <th>Category ID</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Article as $key=>$art):?>
                    <tr>
                        <th scope="row"><?php echo $key+1; ?></th>
                        <td><?php echo h($art['Article']['articles_name']) ?></td>
                        <td><?php echo h($art['Category']['categories_name']); ?></td>
                        <td>
                            <span class="badge badge-pill badge-<?php echo $art['Article']['status']==="Active"?'success':'danger' ?>"><?php echo $art['Article']['status']?></span>
                        </td>
                        <td>
                            <?php
                                echo $this->Html->Link(
                                    'Edit',
                                    array('action' => 'editArticle', $art['Article']['id'])
                                );
                            ?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                </table>
            </div>

            <!-- Pagination links -->
            <div class="paginator">
                <ul>
                    <?php echo $this->Paginator->prev('« Previous'); ?>
                    <?php echo $this->Paginator->numbers(); ?>
                    <?php echo $this->Paginator->next('Next »'); ?>
                </ul>
            </div>
        </div>
        </div>
    </div>

    <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>