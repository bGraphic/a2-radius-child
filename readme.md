# A2 Radius Child Theme

Radius is a Wordpress theme, and this is a child theme depending on it. The child theme is created
for the company A2.

## Installation
Make sure you have both [the Radius theme](https://array.is/themes/radius-wordpress-theme/)
and this theme in your Wordpress themes folder.

## Development
* We do all the work in feature branches.
  * Tiny fixes can be committed on develop.
* When we are happy with our work we merge it into develop.
* When we have completed a set of features we create a release by:
  * Merging develop into master.
  * Updating `style.css` with the new version number.
  * Creating a tag with the same version number.
  * Pushing master to Github with tags.

### Creating a feature branch
To create a feature branch make sure you are standing in develop.

```
git checkout develop
git pull origin
git checkout -b feature/<my-new-feature>
```
To share the branch with others on the team push the branch to Github.
```
git push -u feature/<my-new-feature>
```

### Merging the feature branch into develop

```
git checkout develop
git pull origin
git merge --no-ff -m "Merging my feature into develop"
git branch -d feature/<my-new-feature>
git push origin
```
If you have shared the branch by pushing it to Github, remember to delete it.
```
git branch push origin :feature/<my-new-feature>
```

### Create a release
To be continued.
