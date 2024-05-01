<div ng-app="messageBoard">
    <div class="container" ng-controller="mainController">
        <div class="row">
            <div class="col-lg-4" ng-repeat="item in items">
                <div class="card mb-3">
                    <img ng-src="{{ item.image }}" class="card-img-top" alt="{{ item.title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ item.title }}</h5>
                        <p class="card-text">{{ item.description }}</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

