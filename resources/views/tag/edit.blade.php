<x-layout.master>
    <x-form title="Edit Tag" backRoute="tag.index" method="PUT" action="tag.update" :param="$tag">

        <x-form.field label="Tag" name="name" :value="$tag->name" />

    </x-form>
</x-layout.master>
