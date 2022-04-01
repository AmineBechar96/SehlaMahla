<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;

class ConversationsList extends Component
{

  public $selectedConversation;
  public $messageBody;
  


public function mount()
{
    $this->selectedConversation=Conversation::query()->where('sender_id',auth()->user()->id)->orWhere('receiver_id',auth()->user()->id)->latest()->first();
}


    /**
     * view the conversation
     */

    public function viewConversation($id)
    {
        $this->selectedConversation=Conversation::findOrFail($id);
    }


    /**
     * send message
     */

     public  function sendMessage()
     {
         Message::create([
             'conversation_id'=>$this->selectedConversation->id,
             'user_id'=>auth()->user()->id,
             'body'=>$this->messageBody
         ]);
         $this->reset(['messageBody']);
         $this->viewConversation($this->selectedConversation->id);
     }
    public function render()
    {
       // dd('i am here');
        $conversations=Conversation::query()->where('sender_id',auth()->user()->id)->orWhere('receiver_id',auth()->user()->id)->latest()->get();
        return view('livewire.chat.conversations-list',[
            'conversations'=>$conversations,
        ]);
    }


    
}
