<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 block p-3">
        <div class="row">
          <div class="col-md-12">
            <form @submit.prevent>
          <div class="form-group">
            <label for="event_name">Nombre del evento</label>
            <input type="text" id="event_name" class="form-control" v-model="newEvent.eventName">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="start_date">Fecha de inicio</label>
                <input
                  type="date"
                  id="start_date"
                  class="form-control"
                  v-model="newEvent.startDate"
                >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="end_date">Fecha de fin</label>
                <input type="date" id="end_date" class="form-control" v-model="newEvent.endDate">
              </div>
            </div>
            <div class="col-md-6 mb-4" v-if="addingMode">
              <button class="btn btn-sm btn-primary" @click="addNewEvent">Guardar evento</button>
            </div>
            <template v-else>
              <div class="col-md-6 mb-4">
                <button class="btn btn-sm btn-success" @click="updateEvent">ACtualizar</button>
                <button class="btn btn-sm btn-danger" @click="deleteEvent">Eliminar</button>
                <button class="btn btn-sm btn-secondary" @click="addingMode = !addingMode">Cancelar</button>
              </div>
            </template>
          </div>
        </form>
          </div>
          <div class="col-md-12">
            <Fullcalendar @eventClick="showEvent" :locale="locale" :plugins="calendarPlugins" :events="events"/>
          </div>
        </div>
      </div>

      <div class="col-md-4" v-if="project != null">
        <div class="row">
          <div class="col-md-12 col-xl-12 js-appear-enabled animated fadeIn" data-toggle="appear">
              <div class="block block-rounded">
                  <div class="block-content p-0 overflow-hidden">
                      <div class="project-banner" :style="{ backgroundImage: 'url(' + project.banner + ')' }">

                      </div>
                  </div>
                  <div class="block-content border-bottom">
                      <h5 class="font-size-h1 font-w300 mb-5">{{ project.title }}</h5>
                      <p class="text-muted">
                          <i class="fa fa-map-pin mr-5"></i> {{ project.place }}
                      </p>
                  </div>
                  <div class="block-content block-content-full">
                      <div class="row">
                          <div class="col-12">
                              <button class="btn btn-sm btn-hero btn-noborder btn-secondary btn-block" @click="goToProject">
                                  Detalles
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Fullcalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import esLocale from '@fullcalendar/core/locales/es';

export default {
  components: {
    Fullcalendar
  },
  data() {
    return {
      calendarPlugins: [dayGridPlugin, interactionPlugin],
      locale: esLocale,
      events: "",
      newEvent: {
        eventName: "",
        startDate: "",
        endDate: "",
        type: 'EVENTO',
      },
      event: '',
      addingMode: true,
      indexToUpdate: "",
      project: null
    };
  },
  created() {
    this.getEvents();
    this.getProject()
  },
  methods: {
    addNewEvent() {
      axios
        .post("/api/calendar", {
          ...this.newEvent
        })
        .then(data => {
          this.getEvents(); // update our list of events
          this.resetForm(); // clear newEvent properties (e.g. title, start_date and end_date)
        })
        .catch(err =>
          console.log("Unable to add new event!", err.response.data)
        );
    },
    showEvent(arg) {
      this.addingMode = false;
      const { id, title, start, end } = this.events.find(
        event => event.id === +arg.event.id
      );
      this.indexToUpdate = id;
      this.newEvent = {
        eventName: title,
        startDate: start,
        endDate: end,
        type: 'EVENTO',
      };

      this.event = this.newEvent;
    },
    updateEvent() {
      axios
        .put("/api/calendar/" + this.indexToUpdate, {
          ...this.newEvent
        })
        .then(resp => {
          this.resetForm();
          this.getEvents();
          this.addingMode = !this.addingMode;
        })
        .catch(err =>
          console.log("Unable to update event!", err.response.data)
        );
    },
    deleteEvent() {
      axios
        .delete("/api/calendar/" + this.indexToUpdate)
        .then(resp => {
          this.resetForm();
          this.getEvents();
          this.addingMode = !this.addingMode;
        })
        .catch(err =>
          console.log("Unable to delete event!", err.response.data)
        );
    },
    getEvents() {
      axios
        .get("/api/calendar")
        .then(resp => (this.events = resp.data.data))
        .catch(err => console.log(err.response.data));
    },
    resetForm() {
      Object.keys(this.newEvent).forEach(key => {
        return (this.newEvent[key] = "");
      });
    },
    async getProject(){
      try {
        let URL = '/dashboard/proyectos/next'

        let response = await axios.get(URL)

        if (response) {
          this.project = response.data
        }
      } catch (error) {
        console.log(error)
      }
    },
    goToProject(){
      window.location.href = `/dashboard/proyectos/show/${this.project.id}`
    }
  },
  watch: {
    indexToUpdate() {
      return this.indexToUpdate;
    }
  }
};
</script>

<style lang="css">
@import "~@fullcalendar/core/main.css";
@import "~@fullcalendar/daygrid/main.css";
.fc-title {
  color: #fff;
}
.fc-title:hover {
  cursor: pointer;
}

.project-banner{
            width: 100%;
            padding-top: 50%; /* 1:1 Aspect Ratio */
            background-size: cover;
            background-position: center;
            position: relative; /* If you want text inside of it */
        }
</style>