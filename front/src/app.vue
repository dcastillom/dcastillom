<script src="./app.js"></script>
<style src="./main.styl" lang="stylus"></style>

<template>
  <div>
    <Top></Top>
    <Navigation></Navigation>
    <Home v-if="activeSection == 'home'"></Home>
    <Introduction v-if="activeSection == 'introduction'"></Introduction>
    <Experience v-if="activeSection == 'experience'"></Experience>
    <Education v-if="activeSection == 'education'"></Education>
    <Skills v-if="activeSection == 'skills'"></Skills>
    <Interests v-if="activeSection == 'interests'"></Interests>
    <Contact v-if="activeSection == 'contact'"></Contact>
    <Download v-if="activeSection == 'download'"></Download>
    <Bottom></Bottom>
  </div>
</template>

