<x-layout.master>
    <x-form title="Edit Category" backRoute="category.index" method="PUT" action="category.update" :param="$category">

        <x-form.field label="Category" name="name" :value="$category->name" />

    </x-form>
</x-layout.master>
