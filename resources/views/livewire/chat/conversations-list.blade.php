<div class="content-area-wrapper" style="margin-bottom:0.4rem;">

    @if ($selectedConversation)
    <div class="sidebar-left">
        <div class="sidebar">
            <!-- User Chat profile area -->
            <div class="chat-profile-sidebar">
                <header class="chat-profile-header">
                    <span class="close-icon">
                        <i class="feather icon-x"></i>
                    </span>
                    <div class="header-profile-sidebar">
                        <div class="avatar">
                            @can('isClient')
                            <img class="media-object rounded-circle" src="../../../app-assets/images/icons/client3.png"
                                height="42" width="42" alt="Generic placeholder image">
                            @endcan
                            @can('isProvider')
                            <img class="media-object rounded-circle"
                                src="{{$selectedConversation->booking->service->service_image_url}}" height="42"
                                width="42" alt="Generic placeholder image">
                            @endcan
                            <span class="avatar-status-online avatar-status-lg"></span>
                        </div>
                        <h4 class="chat-user-name">{{auth()->user()->name}}</h4>
                    </div>
                </header>

                <div class="profile-sidebar-area">
                    <div class="scroll-area">
                        <h6>About</h6>
                        <div class="about-user">
                            <fieldset class="mb-0">
                                <textarea data-length="120" class="form-control char-textarea" id="textarea-counter"
                                    rows="5"
                                    placeholder="About User">Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.</textarea>
                            </fieldset>
                            <small class="counter-value float-right"><span class="char-count">108</span> / 120
                            </small>
                        </div>
                        <h6 class="mt-3">Status</h6>
                        <ul class="list-unstyled user-status mb-0">
                            <li class="pb-50">
                                <fieldset>
                                    <div class="vs-radio-con vs-radio-success">
                                        <input type="radio" name="userStatus" value="online" checked="checked">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="">Active</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="pb-50">
                                <fieldset>
                                    <div class="vs-radio-con vs-radio-danger">
                                        <input type="radio" name="userStatus" value="busy">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="">Do Not Disturb</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="pb-50">
                                <fieldset>
                                    <div class="vs-radio-con vs-radio-warning">
                                        <input type="radio" name="userStatus" value="away">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="">Away</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="pb-50">
                                <fieldset>
                                    <div class="vs-radio-con vs-radio-secondary">
                                        <input type="radio" name="userStatus" value="offline">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="">Offline</span>
                                    </div>
                                </fieldset>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ User Chat profile area -->
            <!-- Chat Sidebar area -->
            <div class="sidebar-content card">
                <span class="sidebar-close-icon">
                    <i class="feather icon-x"></i>
                </span>
                <div class="chat-fixed-search">
                    <div class="d-flex align-items-center">
                        <div class="sidebar-profile-toggle position-relative d-inline-flex">
                            <div class="avatar">
                                @can('isClient')
                                <img class="media-object rounded-circle"
                                    src="../../../app-assets/images/icons/client3.png" height="42" width="42"
                                    alt="Generic placeholder image">
                                @endcan
                                @can('isProvider')
                                <img class="media-object rounded-circle"
                                    src="{{$selectedConversation->booking->service->service_image_url}}" height="42"
                                    width="42" alt="Generic placeholder image">
                                @endcan
                                <span class="avatar-status-online"></span>
                            </div>
                            <div class="bullet-success bullet-sm position-absolute"></div>
                        </div>
                        <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                            <input type="text" class="form-control round" id="chat-search"
                                placeholder="Search or start a new chat">
                            <div class="form-control-position">
                                <i class="feather icon-search"></i>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div id="users-list" class="chat-user-list list-group position-relative">
                    <h3 class="primary p-1 mb-0">Chats</h3>
                    <ul class="chat-users-list-wrapper media-list">

                        @forelse ($conversations as $conversation)
                        @if ($conversation->sender_id==auth()->user()->id)
                        <li class="{{$conversation->id===$selectedConversation->id ? 'active' : ''}}"
                            wire:click="viewConversation({{$conversation->id}})">
                            <div class="pr-1">
                                <span class="avatar m-0 avatar-md">

                                    <img class="media-object rounded-circle"
                                        src="{{$conversation->isClient($conversation->receiver->id)===true ? '../../../app-assets/images/icons/client3.png' : $conversation->booking->service->service_image_url}}"
                                        height="42" width="42" alt="Generic placeholder image">


                                    <i></i>
                                </span>
                            </div>
                            <div class="user-chat-info">
                                <div class="contact-info">
                                    <h5 class="font-weight-bold mb-0">
                                        {{ $conversation->isClient($conversation->receiver->id)===true ? $conversation->receiver->name : $conversation->booking->service->title}}
                                    </h5>
                                    <p class="truncate">{{$conversation->messages->last()->body}}</p>
                                </div>
                                <div class="contact-meta">
                                    <span
                                        class="float-right mb-25 font-weight-bold">{{ date('h:i A', strtotime($conversation->messages->last()->created_at))}}</span>
                                    <span class="badge-pill float-right">&nbsp;</span>
                                </div>
                            </div>
                        </li>
                        @else
                        <li class="{{$conversation->id===$selectedConversation->id ? 'active' : ''}}"
                            wire:click="viewConversation({{$conversation->id}})">
                            <div class="pr-1">
                                <span class="avatar m-0 avatar-md">


                                    <img class="media-object rounded-circle"
                                        src="{{$conversation->isClient($conversation->sender->id)===true ? '../../../app-assets/images/icons/client3.png' : $conversation->booking->service->service_image_url}}"
                                        height="42" width="42" alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div>
                            <div class="user-chat-info">
                                <div class="contact-info">
                                    <h5 class="font-weight-bold mb-0">
                                        {{ $conversation->isClient($conversation->sender->id)===true ? $conversation->sender->name : $conversation->booking->service->title}}
                                    </h5>
                                    <p class="truncate">{{$conversation->messages->last()->body}}</p>
                                </div>
                                <div class="contact-meta">
                                    <span
                                        class="float-right mb-25 font-weight-bold">{{ date('h:i A', strtotime($conversation->messages->last()->created_at))}}</span>
                                    <span class="badge-pill float-right">&nbsp;</span>
                                </div>
                            </div>
                        </li>
                        @endif
                        @empty
                        You have no conversation
                        @endforelse


                    </ul>

                </div>
            </div>
            <!--/ Chat Sidebar area -->

        </div>
    </div>
    <div class="content-right">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="chat-overlay"></div>
                <section class="chat-app-window" style="border-bottom: 1px solid #c8ccc9">
                    <!--div class="start-chat-area">
                        <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                        <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                    </div-->
                    <div class="active-chat">
                        <div class="chat_navbar">
                            <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                @if ($selectedConversation)
                                @if ($selectedConversation->sender_id==auth()->user()->id)
                                <div class="vs-con-items d-flex align-items-center">
                                    <div class="sidebar-toggle d-block d-lg-none mr-1"><i
                                            class="feather icon-menu font-large-1"></i></div>
                                    <div class="avatar user-profile-toggle m-0 m-0 mr-1">


                                        <img class="media-object rounded-circle"
                                            src="{{$selectedConversation->isClient($selectedConversation->receiver->id)===true ? '../../../app-assets/images/icons/client3.png' : $selectedConversation->booking->service->service_image_url}}"
                                            height="42" width="42" alt="Generic placeholder image">

                                        @if ($selectedConversation->receiver->isOnline())
                                        <span class="avatar-status-online"></span>
                                        @else
                                        <span class="avatar-status-busy"></span>
                                        @endif
                                    </div>
                                    <h6 class="mb-0">
                                        {{ $selectedConversation->isClient($selectedConversation->receiver->id)===true ? $selectedConversation->receiver->name : $selectedConversation->booking->service->title}}
                                    </h6>
                                </div>
                                @else
                                <div class="vs-con-items d-flex align-items-center">
                                    <div class="sidebar-toggle d-block d-lg-none mr-1"><i
                                            class="feather icon-menu font-large-1"></i></div>
                                    <div class="avatar user-profile-toggle m-0 m-0 mr-1">


                                        <img class="media-object rounded-circle"
                                            src="{{$selectedConversation->isClient($selectedConversation->sender->id)===true ? '../../../app-assets/images/icons/client3.png' : $selectedConversation->booking->service->service_image_url}}"
                                            height="42" width="42" alt="Generic placeholder image">
                                        @if ($selectedConversation->sender->isOnline())
                                        <span class="avatar-status-online"></span>
                                        @else
                                        <span class="avatar-status-busy"></span>
                                        @endif
                                    </div>
                                    <h6 class="mb-0">
                                        {{ $selectedConversation->isClient($selectedConversation->sender->id)===true ? $selectedConversation->sender->name : $selectedConversation->booking->service->title}}
                                    </h6>
                                </div>
                                @endif
                                @else
                                no chat found
                                @endif


                                <span class="favorite"><i class="feather icon-star font-medium-5"></i></span>
                            </header>
                        </div>
                        <div class="user-chats" wire:ignore.self>
                            <div class="chats">
                                @if ($selectedConversation)
                                @foreach ($selectedConversation->messages as $message)



                                <div class="chat {{$message->user_id === auth()->id() ? '' : 'chat-left'}}">
                                    <div class="chat-avatar">
                                        <a class="avatar m-0" data-toggle="tooltip" href="#"
                                            data-placement="{{$message->user_id === auth()->id() ? 'right' : 'left'}}"
                                            title="" data-original-title="">



                                            <img class="media-object rounded-circle"
                                                src="{{$selectedConversation->isClient($message->user_id)===true ? '../../../app-assets/images/icons/client3.png' : $selectedConversation->booking->service->service_image_url}}"
                                                height="42" width="42" alt="Generic placeholder image">

                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                            <p>{{$message->body}}</p>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                @else
                                <div class="start-chat-area">
                                    <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                                    <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                                </div>
                                @endif





                                <!--div class="divider">
                                    <div class="divider-text">Yesterday</div>
                                </div-->

                            </div>
                        </div>
                        <div class="chat-app-form">
                            <form class="chat-app-input d-flex" wire:submit.prevent="sendMessage" method="POST">
                                @csrf
                                <input type="text" wire:model.defer="messageBody"
                                    class="form-control message mr-1 ml-50" id="iconLeft4-1"
                                    placeholder="Type your message">
                                <button type="submit" class="btn btn-primary send"><i
                                        class="fa fa-paper-plane-o d-lg-none"></i> <span
                                        class="d-none d-lg-block">Send</span></button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- User Chat profile right area -->
                <div class="user-profile-sidebar">


                    @if ($selectedConversation->sender->id===auth()->user()->id)
                    <header class="user-profile-header">
                        <span class="close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="header-profile-sidebar">
                            <div class="avatar">

                                <img class="media-object rounded-circle"
                                    src="{{$selectedConversation->isClient($selectedConversation->receiver->id)===true ? '../../../app-assets/images/icons/client3.png' : $selectedConversation->booking->service->service_image_url}}"
                                    height="70" width="70" alt="Generic placeholder image">
                                @if ($selectedConversation->receiver->isOnline())
                                <span class="avatar-status-online avatar-status-lg"></span>
                                @else
                                <span class="avatar-status-busy avatar-status-lg"></span>
                                @endif

                            </div>
                            <h4 class="chat-user-name">
                                {{ $selectedConversation->isClient($selectedConversation->receiver->id)===true ? $selectedConversation->receiver->name : $selectedConversation->booking->service->title}}
                            </h4>
                        </div>
                    </header>
                    <div class="user-profile-sidebar-area p-2 text-center">
                        <h6>About</h6>

                        <p>{{$selectedConversation->isClient($selectedConversation->receiver->id)===true ? $selectedConversation->booking->description : $selectedConversation->booking->service->body
                            
                            }}</p>
                    </div>
                    @else
                    <header class="user-profile-header">
                        <span class="close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="header-profile-sidebar">
                            <div class="avatar">

                                <img class="media-object rounded-circle"
                                    src="{{$selectedConversation->isClient($selectedConversation->sender->id)===true ? '../../../app-assets/images/icons/client3.png' : $selectedConversation->booking->service->service_image_url}}"
                                    height="70" width="70" alt="Generic placeholder image">
                                @if ($selectedConversation->sender->isOnline())
                                <span class="avatar-status-online avatar-status-lg"></span>
                                @else
                                <span class="avatar-status-busy avatar-status-lg"></span>
                                @endif
                            </div>
                            <h4 class="chat-user-name">
                                {{ $selectedConversation->isClient($selectedConversation->sender->id)===true ? $selectedConversation->sender->name : $selectedConversation->booking->service->title}}
                            </h4>
                        </div>
                    </header>
                    <div class="user-profile-sidebar-area p-2 text-center">
                        <h6>About</h6>

                        <p>{{$selectedConversation->isClient($selectedConversation->sender->id)===true ? $selectedConversation->booking->description : $selectedConversation->booking->service->body
                                
                                }}</p>
                    </div>
                    @endif






                </div>
                <!--/ User Chat profile right area -->

            </div>
        </div>
    </div>
    @else






    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header justify-content-center d-flex flex-column mb-5">
                <div class="avatar bg-primary mb-2">
                    <span class="avatar-content" style="width:100px; height:100px;"><i
                            class="avatar-icon feather icon-message-circle" style="font-size:3rem"></i></span>

                </div>
                <h6 class="card-title font-medium-2 text-center ">Vous Avez Aucun Historique de Chat

                </h6>
                <p class="text-center">Inserer les Information Qui Sont reliées a votre client vous pouvez
                    le contacter avec notre service de messagerie </p>
            </div>

        </div>
    </div>


    @endif


</div>